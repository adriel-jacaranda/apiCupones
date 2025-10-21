<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Campania;
use App\Models\Comercio;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Exception;

class CampaniaController extends Controller
{
    // Listar todas las campañas activas (sin try-catch)
public function index()
{
    $campanias = Campania::with(['tipoCliente', 'almacenes','cupones'])
        // ->where('activo', true)
        ->get();

    return response()->json($campanias);
}

public function indexAll()
{
    $campanias = Campania::with(['cupones'])
        // ->where('activo', true)
        ->get();

    return response()->json($campanias);
}

    // Mostrar campaña específica
    public function show($id)
    {
        try {
            $campania = Campania::with('tipoCliente', 'cupones')->find($id);
            if (!$campania) {
                return response()->json(['message' => 'Campaña no encontrada'], 404);
            }
            return response()->json($campania);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener campaña',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Crear campaña y generar cupones automáticamente
public function store(Request $request)
{
    try {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'descuento_porcentaje' => 'nullable|integer|min:0|max:100',
            'compra_minima' => 'nullable|numeric|min:0',
            'compra_maxima' => 'nullable|numeric|gte:compra_minima',
            'fecha_caducidad' => 'required|date|after:today',
            'cantidad_maxima' => 'required|integer|min:1',
            'id_tipo_cliente' => 'nullable|exists:tipo_clientes,id',
            'activo' => 'nullable|boolean',
            'almacenes' => 'array',
            'almacenes.*' => 'exists:almacenes,id',
            'banner' => 'nullable|image|max:2048', // Validación del banner
        ]);

        // Crear campaña
        $campania = Campania::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'descuento_porcentaje' => $request->descuento_porcentaje,
            'compra_minima' => $request->compra_minima,
            'compra_maxima' => $request->compra_maxima,
            'fecha_caducidad' => $request->fecha_caducidad,
            'cantidad_maxima' => $request->cantidad_maxima,
            'id_tipo_cliente' => $request->id_tipo_cliente,
            'banner' => $request->banner,
            'activo' => $request->activo ?? true,
        ]);

        // Subir banner si existe
        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('banner_campanias', 'public');
            $campania->update(['banner' => $path]);
        }

        // Asociar almacenes si vienen en el request
        if ($request->has('almacenes')) {
            $campania->almacenes()->sync($request->almacenes);
        }

        // Generar cupones
        for ($i = 0; $i < $campania->cantidad_maxima; $i++) {
            Cupon::create([
                'codigo' => strtoupper(Str::random(10)),
                'campania_id' => $campania->id,
            ]);
        }

        return response()->json($campania->load('almacenes'), 201);

    } catch (ValidationException $e) {
        return response()->json([
            'errors' => $e->errors(),
        ], 422);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error al crear campaña',
            'error' => $e->getMessage(),
        ], 500);
    }
}


// Actualizar campaña
public function update(Request $request, $id)
{
    try {
        $campania = Campania::find($id);
        if (!$campania) {
            return response()->json(['message' => 'Campaña no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'descripcion' => 'nullable|string',
            'descuento_porcentaje' => 'nullable|integer|min:0|max:100',
            'compra_minima' => 'nullable|numeric|min:0',
            'compra_maxima' => 'nullable|numeric|gte:compra_minima',
            'fecha_caducidad' => 'sometimes|required|date|after:today',
            'cantidad_maxima' => 'nullable|integer|min:1',
            'id_tipo_cliente' => 'nullable|exists:tipo_clientes,id',
            'activo' => 'nullable|boolean',
            'almacenes' => 'array',
            'almacenes.*' => 'exists:almacenes,id',
            'banner' => 'nullable|image|max:2048',
        ]);

        // Actualizar datos excepto 'almacenes' y 'banner'
        $data = $request->except(['almacenes', 'banner']);
        $campania->update($data);

        // Si hay un nuevo banner
        if ($request->hasFile('banner')) {
            // Eliminar banner anterior
            if ($campania->banner && \Storage::disk('public')->exists($campania->banner)) {
                \Storage::disk('public')->delete($campania->banner);
            }

            // Subir nuevo banner
            $path = $request->file('banner')->store('banner_campanias', 'public');
            $campania->banner = $path;
            $campania->save();
        }

        // Actualizar almacenes
        if ($request->has('almacenes')) {
            $campania->almacenes()->sync($request->almacenes);
        }

        return response()->json($campania->load('almacenes'));

    } catch (ValidationException $e) {
        return response()->json(['errors' => $e->errors()], 422);
    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error al actualizar campaña',
            'error' => $e->getMessage(),
        ], 500);
    }
}




    // Eliminar campaña
public function destroy($id)
{
    try {
        $campania = Campania::find($id);
        if (!$campania) {
            return response()->json(['message' => 'Campaña no encontrada'], 404);
        }

        // Obtener todos los IDs de cupones asociados a la campaña
        $cuponesIds = $campania->cupones()->pluck('id');

        // Verificar si alguno de esos cupones ya fue reclamado
        $cuponReclamado = \DB::table('asignaciones_cupones')
            ->whereIn('cupon_id', $cuponesIds)
            ->exists();

        if ($cuponReclamado) {
            return response()->json([
                'message' => 'No se puede eliminar la campaña porque algunos cupones ya fueron reclamados'
            ], 409);
        }

        // Eliminar relaciones en campania_almacen
        $campania->almacenes()->detach(); 

        // Eliminar cupones y campaña
        $campania->cupones()->delete();
        $campania->delete();

        return response()->json(['message' => 'Campaña, cupones y almacenes asociados eliminados correctamente']);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error al eliminar campaña',
            'error' => $e->getMessage(),
        ], 500);
    }
}


// Obtener campañas por tipo de cliente (filtra solo activas, opcional)
public function campaniasPorTipoCliente($id_tipo_cliente)
{
    try {
        $campanias = Campania::with(['tipoCliente', 'almacenes'])  // Aquí agregamos almacenes
            ->where('id_tipo_cliente', $id_tipo_cliente)
            ->where('activo', true) // Solo campañas activas
            ->get();

        if ($campanias->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron campañas para este tipo de cliente'
            ], 404);
        }

        return response()->json($campanias);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error al obtener campañas por tipo de cliente',
            'error' => $e->getMessage(),
        ], 500);
    }
}


public function asociarAlmacenes(Request $request, $campaniaId)
{
    try {
        // Validar que venga un array de almacenes
        $request->validate([
            'almacenes' => 'required|array',
            'almacenes.*' => 'exists:almacenes,id'
        ]);

        // Buscar campaña
        $campania = Campania::findOrFail($campaniaId);

        // Asociar almacenes (reemplaza relaciones anteriores)
        $campania->almacenes()->sync($request->almacenes);

        return response()->json([
            'message' => 'Almacenes asociados correctamente a la campaña',
            'campania' => $campania->load('almacenes') // Incluye almacenes en la respuesta
        ], 200);
    } catch (\Throwable $e) {
        return response()->json([
            'message' => 'Error al asociar almacenes a la campaña',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function getCampaniasPorAlmacen($almacenId)
{
    try {
        $almacen = Comercio::with('campanias')->findOrFail($almacenId);

        return response()->json([
            'campanias' => $almacen->campanias,
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error al obtener campañas del almacén',
            'error' => $e->getMessage(),
        ], 500);
    }
}


}
