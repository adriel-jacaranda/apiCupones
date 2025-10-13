<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comercio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Exception;

class ComercioController extends Controller
{
    public function index()
    {
        return response()->json(Comercio::all());
    }
    public function indexW()
    {
        return response()->json(Comercio::all());
    }
    public function campaniasDeAlmacen($id)
    {
        $almacen = Comercio::with(['campanias.cupones', 'categoria'])
            ->findOrFail($id);
        return response()->json($almacen);
    }

    public function porCategoria($categoriaId)
    {
        $almacenes = Comercio::where('categoria_almacen_id', $categoriaId)->get();
        return response()->json($almacenes);
    }

    public function show($id)
    {
        $almacen = Comercio::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }
        return response()->json($almacen);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'direccion' => 'nullable|string',
                'telefono' => 'nullable|string|max:20',
                'lat' => 'nullable|numeric|between:-90,90',
                'lng' => 'nullable|numeric|between:-180,180',
                'categoria_almacen_id' => 'nullable|exists:categoria_almacen,id',
                'activo' => 'nullable|boolean',
                'logo' => 'nullable|image|max:2048',
            ]);

            $data = $request->except('logo');

            if ($request->hasFile('logo')) {
                $path = $request->file('logo')->store('almacenes', 'public');
                $data['logo'] = $path;
            }

            $almacen = Comercio::create($data);

            return response()->json($almacen, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear almacén', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $almacen = Comercio::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }

        try {
            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'direccion' => 'nullable|string',
                'telefono' => 'nullable|string|max:20',
                'lat' => 'nullable|numeric|between:-90,90',
                'lng' => 'nullable|numeric|between:-180,180',
                'categoria_almacen_id' => 'nullable|exists:categoria_almacen,id',
                'activo' => 'nullable|boolean',
                'logo' => 'nullable|image|max:2048',
            ]);

            $data = $request->except('logo');

            if ($request->hasFile('logo')) {
                if ($almacen->logo && Storage::disk('public')->exists($almacen->logo)) {
                    Storage::disk('public')->delete($almacen->logo);
                }
                $path = $request->file('logo')->store('almacenes', 'public');
                $data['logo'] = $path;
            }

            $almacen->update($data);

            return response()->json($almacen);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar almacén', 'error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $almacen = Comercio::find($id);
        if (!$almacen) {
            return response()->json(['message' => 'Almacén no encontrado'], 404);
        }

        try {
            if ($almacen->logo && Storage::disk('public')->exists($almacen->logo)) {
                Storage::disk('public')->delete($almacen->logo);
            }

            $almacen->delete();
            return response()->json(['message' => 'Almacén eliminado correctamente']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar almacén', 'error' => $e->getMessage()], 500);
        }
    }
}
