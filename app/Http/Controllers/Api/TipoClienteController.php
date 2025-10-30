<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoCliente;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class TipoClienteController extends Controller
{
    /**
     * @group Tipos de Cliente ADM
     *
     * Listar tipos de cliente
     *
     * Retorna todos los tipos de cliente registrados.
     *
     * @response 200 [
     *   {
     *     "id": 1,
     *     "nombre": "Cliente Premium",
     *     "descripcion": "Acceso a promociones especiales",
     *     "created_at": "2025-10-28T20:00:00.000000Z",
     *     "updated_at": "2025-10-28T20:00:00.000000Z"
     *   }
     * ]
     */
    public function index()
    {
        return TipoCliente::all();
    }

    /**
     * @group Tipos de Cliente ADM
     *
     * Crear un tipo de cliente
     *
     * Crea un nuevo tipo de cliente en el sistema.
     *
     * @bodyParam nombre string required Nombre del tipo de cliente. Example: Cliente Premium
     * @bodyParam descripcion string Descripción del tipo de cliente. Example: Acceso a promociones especiales
     *
     * @response 201 {
     *   "id": 1,
     *   "nombre": "Cliente Premium",
     *   "descripcion": "Acceso a promociones especiales",
     *   "created_at": "2025-10-28T20:00:00.000000Z",
     *   "updated_at": "2025-10-28T20:00:00.000000Z"
     * }
     * @response 500 {
     *   "message": "Error al crear tipo de cliente",
     *   "error": "Mensaje del error"
     * }
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
            ]);

            $tipo = TipoCliente::create($validated);

            return response()->json($tipo, 201);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear tipo de cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Tipos de Cliente ADM
     *
     * Mostrar un tipo de cliente
     *
     * Obtiene los datos de un tipo de cliente por su ID.
     *
     * @urlParam id integer required ID del tipo de cliente. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Cliente Premium",
     *   "descripcion": "Acceso a promociones especiales",
     *   "created_at": "2025-10-28T20:00:00.000000Z",
     *   "updated_at": "2025-10-28T20:00:00.000000Z"
     * }
     * @response 404 {
     *   "message": "Tipo de cliente no encontrado"
     * }
     */
    public function show($id)
    {
        try {
            $tipoCliente = TipoCliente::findOrFail($id);
            return response()->json($tipoCliente);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Tipo de cliente no encontrado'
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener el tipo de cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Tipos de Cliente ADM
     *
     * Actualizar un tipo de cliente
     *
     * Actualiza los datos de un tipo de cliente existente.
     *
     * @urlParam id integer required ID del tipo de cliente. Example: 1
     * @bodyParam nombre string required Nombre del tipo de cliente. Example: Cliente Regular
     * @bodyParam descripcion string Descripción del tipo de cliente. Example: Acceso a descuentos estándar
     *
     * @response 200 {
     *   "id": 1,
     *   "nombre": "Cliente Regular",
     *   "descripcion": "Acceso a descuentos estándar",
     *   "created_at": "2025-10-28T20:00:00.000000Z",
     *   "updated_at": "2025-10-29T12:00:00.000000Z"
     * }
     * @response 404 {
     *   "message": "Tipo de cliente no encontrado"
     * }
     */
    public function update(Request $request, $id)
    {
        try {
            $tipoCliente = TipoCliente::findOrFail($id);

            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
            ]);

            $tipoCliente->update($validated);

            return response()->json($tipoCliente);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Tipo de cliente no encontrado'
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar el tipo de cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @group Tipos de Cliente ADM
     *
     * Eliminar un tipo de cliente
     *
     * Elimina un tipo de cliente por su ID.
     *
     * @urlParam id integer required ID del tipo de cliente. Example: 1
     *
     * @response 200 {
     *   "message": "Tipo de cliente eliminado correctamente"
     * }
     * @response 404 {
     *   "message": "Tipo de cliente no encontrado"
     * }
     */
    public function destroy($id)
    {
        try {
            $tipoCliente = TipoCliente::findOrFail($id);
            $tipoCliente->delete();

            return response()->json([
                'message' => 'Tipo de cliente eliminado correctamente'
            ]);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Tipo de cliente no encontrado'
            ], 404);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar el tipo de cliente',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
