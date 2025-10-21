<?php

namespace App\Http\Controllers;

use App\Models\CategoriaAlmacen;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class CategoriaAlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorias = CategoriaAlmacen::all();
            return response()->json($categorias);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener categorías', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'icono' => 'nullable|image|max:2048',
                'activo' => 'nullable|boolean',
            ]);

            $data = $request->except('icono');

            if ($request->hasFile('icono')) {
                $path = $request->file('icono')->store('categoria_iconos', 'public');
                $data['icono'] = $path;
            }

            $categoria = CategoriaAlmacen::create($data);
            return response()->json($categoria, 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear categoría', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $categoria = CategoriaAlmacen::find($id);
            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }
            return response()->json($categoria);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener categoría', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $categoria = CategoriaAlmacen::find($id);
            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }

            $request->validate([
                'nombre' => 'sometimes|required|string|max:255',
                'descripcion' => 'nullable|string',
                'icono' => 'nullable|image|max:2048',
                'activo' => 'nullable|boolean',
            ]);

            $data = $request->except('icono');

            if ($request->hasFile('icono')) {
                // Borrar icono anterior si existe
                if ($categoria->icono && \Storage::disk('public')->exists($categoria->icono)) {
                    \Storage::disk('public')->delete($categoria->icono);
                }
                $path = $request->file('icono')->store('categoria_iconos', 'public');
                $data['icono'] = $path;
            }

            $categoria->update($data);
            return response()->json($categoria);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al actualizar categoría', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $categoria = CategoriaAlmacen::find($id);
            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }

            // Borrar icono si existe
            if ($categoria->icono && \Storage::disk('public')->exists($categoria->icono)) {
                \Storage::disk('public')->delete($categoria->icono);
            }

            $categoria->delete();
            return response()->json(['message' => 'Categoría eliminada correctamente']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar categoría', 'error' => $e->getMessage()], 500);
        }
    }
}
