<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TipoCliente;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class TipoClienteController extends Controller
{
    public function index()
    {
        return TipoCliente::all();
    }

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
