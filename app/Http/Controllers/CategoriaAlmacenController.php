<?php

namespace App\Http\Controllers;

use App\Models\CategoriaAlmacen;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Storage;
use Exception;

class CategoriaAlmacenController extends Controller
{
    /**
     * @group Creación de Categorías de Comercio ADM
     *
     * Listar todas las categorías
     *
     * Devuelve una lista de todas las categorías registradas.
     *
     * @authenticated
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "nombre": "Bebidas",
     *     "descripcion": "Categoría de bebidas frías y calientes",
     *     "icono": "categoria_iconos/bebidas.png",
     *     "activo": true
     *   }
     * ]
     *
     * @response 500 {
     *   "message": "Error al obtener categorías",
     *   "error": "Detalles del error"
     * }
     */
    public function index()
    {
        try {
            $categorias = CategoriaAlmacen::all();
            return response()->json($categorias);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener categorías',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Creación de Categorías de Comercio ADM
     *
     * Crear una nueva categoría
     *
     * Permite registrar una nueva categoría de comercio.
     * Requiere autenticación con token **Bearer**.
     *
     * @authenticated
     *
     * @bodyParam nombre string required Nombre de la categoría. Example: Bebidas
     * @bodyParam descripcion string Descripción breve. Example: Categoría de bebidas frías y calientes
     * @bodyParam activo boolean Indica si la categoría está activa. Example: true
     *
     * @response 201 {
     *   "id": 1,
     *   "nombre": "Bebidas",
     *   "descripcion": "Categoría de bebidas frías y calientes",
     *   "icono": "categoria_iconos/bebidas.png",
     *   "activo": true
     * }
     *
     * @response 422 {
     *   "errors": {
     *     "nombre": ["El campo nombre es obligatorio."]
     *   }
     * }
     *
     * @response 500 {
     *   "message": "Error al crear categoría",
     *   "error": "Detalles del error"
     * }
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'icono' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'activo' => 'nullable|boolean',
            ]);

            $data = $request->only(['nombre', 'descripcion', 'activo']);

            if ($request->hasFile('icono')) {
                $path = $request->file('icono')->store('categoria_iconos', 'public');
                $data['icono'] = $path;
            }

            $categoria = CategoriaAlmacen::create($data);

            return response()->json($categoria, 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Creación de Categorías de Comercio ADM
     *
     * Mostrar una categoría específica
     *
     * Obtiene la información de una categoría por su ID.
     * Requiere autenticación con token **Bearer**.
     *
     * @authenticated
     *
     * @urlParam id integer required ID de la categoría. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Bebidas",
     *   "descripcion": "Categoría de bebidas frías y calientes",
     *   "icono": "categoria_iconos/bebidas.png",
     *   "activo": true
     * }
     *
     * @response 404 {
     *   "message": "Categoría no encontrada"
     * }
     *
     * @response 500 {
     *   "message": "Error al obtener categoría",
     *   "error": "Detalles del error"
     * }
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
            return response()->json([
                'message' => 'Error al obtener categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Creación de Categorías de Comercio ADM
     *
     * Actualizar una categoría
     *
     * Permite modificar los datos de una categoría existente.
     * Requiere autenticación con token **Bearer**.
     *
     * @authenticated
     *
     * @urlParam id integer required ID de la categoría. Example: 1
     * @bodyParam nombre string Nombre de la categoría. Example: Alimentos
     * @bodyParam descripcion string Descripción de la categoría. Example: Comidas preparadas y snacks
     * @bodyParam activo boolean Estado de la categoría. Example: true
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Alimentos",
     *   "descripcion": "Comidas preparadas y snacks",
     *   "icono": "categoria_iconos/alimentos.png",
     *   "activo": true
     * }
     *
     * @response 404 {
     *   "message": "Categoría no encontrada"
     * }
     *
     * @response 500 {
     *   "message": "Error al actualizar categoría",
     *   "error": "Detalles del error"
     * }
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
                'icono' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'activo' => 'nullable|boolean',
            ]);

            $data = $request->only(['nombre', 'descripcion', 'activo']);

            if ($request->hasFile('icono')) {
                if ($categoria->icono && Storage::disk('public')->exists($categoria->icono)) {
                    Storage::disk('public')->delete($categoria->icono);
                }

                $path = $request->file('icono')->store('categoria_iconos', 'public');
                $data['icono'] = $path;
            }

            $categoria->update($data);

            return response()->json($categoria);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Creación de Categorías de Comercio ADM
     *
     * Eliminar una categoría
     *
     * Elimina una categoría por su ID.
     * Requiere autenticación con token **Bearer**.
     *
     * @authenticated
     *
     * @urlParam id integer required ID de la categoría. Example: 1
     *
     * @response 200 {
     *   "message": "Categoría eliminada correctamente"
     * }
     *
     * @response 404 {
     *   "message": "Categoría no encontrada"
     * }
     *
     * @response 500 {
     *   "message": "Error al eliminar categoría",
     *   "error": "Detalles del error"
     * }
     */
    public function destroy(string $id)
    {
        try {
            $categoria = CategoriaAlmacen::find($id);

            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }

            if ($categoria->icono && Storage::disk('public')->exists($categoria->icono)) {
                Storage::disk('public')->delete($categoria->icono);
            }

            $categoria->delete();

            return response()->json(['message' => 'Categoría eliminada correctamente']);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar categoría',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
