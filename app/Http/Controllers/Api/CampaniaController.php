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
    /**
     * @group Campañas ADM
     *
     * Listar todas las campañas
     *
     * Retorna todas las campañas registradas con sus relaciones.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "nombre": "Campaña Día de la Madre",
     *     "descripcion": "Descuentos especiales por el día de la madre",
     *     "descuento_porcentaje": 20,
     *     "cantidad_maxima": 100,
     *     "activo": true,
     *     "tipo_cliente": { "id": 1, "nombre": "Cliente Premium" },
     *     "almacenes": [],
     *     "cupones": []
     *   }
     * ]
     */
    public function index()
    {
        $campanias = Campania::with(['tipoCliente', 'almacenes', 'cupones'])->get();
        return response()->json($campanias);
    }

    /**
     * @group Campañas ADM
     *
     * Listar todas las campañas (modo completo)
     *
     * Retorna todas las campañas con sus cupones, sin filtrar por estado.
     *
     * @response 200 array<Campania>
     */
    public function indexAll()
    {
        $campanias = Campania::with(['cupones'])->get();
        return response()->json($campanias);
    }

    /**
     * @group Campañas ADM
     *
     * Mostrar una campaña
     *
     * Obtiene los datos de una campaña específica.
     *
     * @urlParam id integer required ID de la campaña. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Campaña de Verano",
     *   "descripcion": "Descuentos en productos seleccionados",
     *   "tipo_cliente": { "id": 1, "nombre": "Cliente Regular" },
     *   "cupones": []
     * }
     * @response 404 {
     *   "message": "Campaña no encontrada"
     * }
     */
    public function show($id)
    {
        try {
            $campania = Campania::with('tipoCliente', 'cupones')->find($id);
            if (!$campania) {
                return response()->json(['message' => 'Campaña no encontrada'], 404);
            }
            return response()->json($campania);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener campaña', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Campañas ADM
     *
     * Crear una nueva campaña
     *
     * Crea una campaña y genera automáticamente sus cupones asociados.
     *
     * @bodyParam nombre string required Nombre de la campaña. Example: Campaña Día del Padre
     * @bodyParam descripcion string Descripción de la campaña. Example: Descuentos especiales en artículos de regalo
     * @bodyParam descuento_porcentaje integer Porcentaje de descuento. Example: 15
     * @bodyParam compra_minima number Monto mínimo de compra. Example: 50
     * @bodyParam compra_maxima number Monto máximo de compra. Example: 500
     * @bodyParam fecha_caducidad date required Fecha de caducidad de los cupones. Example: 2025-12-31
     * @bodyParam cantidad_maxima integer required Cantidad total de cupones a generar. Example: 100
     * @bodyParam id_tipo_cliente integer ID del tipo de cliente. Example: 1
     * @bodyParam activo boolean Indica si la campaña está activa. Example: true
     * @bodyParam almacenes array IDs de almacenes asociados. Example: [1, 2, 3]
     * @bodyParam banner file Imagen de banner de la campaña.
     *
     * @response 201 {
     *   "id": 10,
     *   "nombre": "Campaña Día del Padre",
     *   "descripcion": "Descuentos especiales en artículos de regalo",
     *   "banner": "storage/banner_campanias/padre.jpg",
     *   "almacenes": []
     * }
     * @response 422 {
     *   "errors": { "nombre": ["El campo nombre es obligatorio."] }
     * }
     */
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
                'banner' => 'nullable|image|max:2048',
            ]);

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

            if ($request->hasFile('banner')) {
                $path = $request->file('banner')->store('banner_campanias', 'public');
                $campania->update(['banner' => $path]);
            }

            if ($request->has('almacenes')) {
                $campania->almacenes()->sync($request->almacenes);
            }

            for ($i = 0; $i < $campania->cantidad_maxima; $i++) {
                Cupon::create([
                    'codigo' => strtoupper(Str::random(10)),
                    'campania_id' => $campania->id,
                ]);
            }

            return response()->json($campania->load('almacenes'), 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear campaña', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Campañas ADM
     *
     * Actualizar una campaña
     *
     * Modifica los datos de una campaña existente.
     *
     * @urlParam id integer required ID de la campaña. Example: 1
     * @bodyParam nombre string Nuevo nombre de la campaña. Example: Campaña de Navidad
     * @bodyParam descripcion string Descripción de la campaña. Example: Ofertas navideñas
     * @bodyParam fecha_caducidad date Nueva fecha de caducidad. Example: 2025-12-31
     * @bodyParam banner file Nuevo banner de la campaña.
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Campaña de Navidad",
     *   "descripcion": "Ofertas navideñas",
     *   "almacenes": []
     * }
     * @response 404 {
     *   "message": "Campaña no encontrada"
     * }
     */
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

            $data = $request->except(['almacenes', 'banner']);
            $campania->update($data);

            if ($request->hasFile('banner')) {
                if ($campania->banner && \Storage::disk('public')->exists($campania->banner)) {
                    \Storage::disk('public')->delete($campania->banner);
                }
                $path = $request->file('banner')->store('banner_campanias', 'public');
                $campania->banner = $path;
                $campania->save();
            }

            if ($request->has('almacenes')) {
                $campania->almacenes()->sync($request->almacenes);
            }

            return response()->json($campania->load('almacenes'));
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar campaña', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Campañas ADM
     *
     * Eliminar una campaña
     *
     * Elimina una campaña junto con sus cupones y relaciones.
     *
     * @urlParam id integer required ID de la campaña. Example: 3
     *
     * @response 200 {
     *   "message": "Campaña, cupones y almacenes asociados eliminados correctamente"
     * }
     * @response 404 {
     *   "message": "Campaña no encontrada"
     * }
     */
    public function destroy($id)
    {
        try {
            $campania = Campania::find($id);
            if (!$campania) {
                return response()->json(['message' => 'Campaña no encontrada'], 404);
            }

            $cuponesIds = $campania->cupones()->pluck('id');
            $cuponReclamado = \DB::table('asignaciones_cupones')->whereIn('cupon_id', $cuponesIds)->exists();

            if ($cuponReclamado) {
                return response()->json(['message' => 'No se puede eliminar la campaña porque algunos cupones ya fueron reclamados'], 409);
            }

            $campania->almacenes()->detach();
            $campania->cupones()->delete();
            $campania->delete();

            return response()->json(['message' => 'Campaña, cupones y almacenes asociados eliminados correctamente']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar campaña', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Campañas ADM
     *
     * Listar campañas por tipo de cliente
     *
     * Obtiene todas las campañas activas asociadas a un tipo de cliente.
     *
     * @urlParam id_tipo_cliente integer required ID del tipo de cliente. Example: 1
     *
     * @response 200 array<Campania>
     * @response 404 {
     *   "message": "No se encontraron campañas para este tipo de cliente"
     * }
     */
    public function campaniasPorTipoCliente($id_tipo_cliente)
    {
        try {
            $campanias = Campania::with(['tipoCliente', 'almacenes'])
                ->where('id_tipo_cliente', $id_tipo_cliente)
                ->where('activo', true)
                ->get();

            if ($campanias->isEmpty()) {
                return response()->json(['message' => 'No se encontraron campañas para este tipo de cliente'], 404);
            }

            return response()->json($campanias);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener campañas por tipo de cliente', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Campañas ADM
     *
     * Asociar almacenes a una campaña
     *
     * @urlParam campaniaId integer required ID de la campaña. Example: 1
     * @bodyParam almacenes array required IDs de almacenes. Example: [2,3]
     *
     * @response 200 {
     *   "message": "Almacenes asociados correctamente a la campaña"
     * }
     */
    public function asociarAlmacenes(Request $request, $campaniaId)
    {
        try {
            $request->validate([
                'almacenes' => 'required|array',
                'almacenes.*' => 'exists:almacenes,id'
            ]);

            $campania = Campania::findOrFail($campaniaId);
            $campania->almacenes()->sync($request->almacenes);

            return response()->json([
                'message' => 'Almacenes asociados correctamente a la campaña',
                'campania' => $campania->load('almacenes')
            ], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al asociar almacenes', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Campañas ADM
     *
     * Obtener campañas por almacén
     *
     * Muestra todas las campañas asociadas a un almacén.
     *
     * @urlParam almacenId integer required ID del almacén. Example: 5
     *
     * @response 200 {
     *   "campanias": []
     * }
     */
    public function getCampaniasPorAlmacen($almacenId)
    {
        try {
            $almacen = Comercio::with('campanias')->findOrFail($almacenId);
            return response()->json(['campanias' => $almacen->campanias], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener campañas del almacén', 'error' => $e->getMessage()], 500);
        }
    }
}
