<?php

namespace App\Http\Controllers;

use App\Models\CuponRedimido;
use Illuminate\Http\Request;

class CuponRedimidoController extends Controller
{
    public function index()
    {
        $cupones = CuponRedimido::with('usuario')->latest()->get();
        return response()->json($cupones);
    }

    public function porUserId($userId)
    {
        $cupones = CuponRedimido::where('userId', $userId)
            ->with(['cupon', 'comercio'])
            ->latest()
            ->get();

        if ($cupones->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron cupones redimidos para este usuario.',
                'data' => []
            ], 404);
        }

        return response()->json([
            'message' => 'Cupones redimidos encontrados.',
            'data' => $cupones
        ]);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'id_usuario' => 'nullable|exists:users,id',
                'userId' => 'nullable|integer',
                'couponId' => 'required|integer',
                'comercioId' => 'nullable|integer',
            ]);

            $existe = CuponRedimido::where('couponId', $data['couponId'])
                ->where(function ($query) use ($data) {
                    if (!empty($data['userId'])) {
                        $query->where('userId', $data['userId']);
                    }
                    if (!empty($data['id_usuario'])) {
                        $query->orWhere('id_usuario', $data['id_usuario']);
                    }
                })
                ->first();

            if ($existe) {
                return response()->json([
                    'message' => 'Este cupón ya fue redimido por este usuario.',
                    'data' => $existe
                ], 409);
            }

            $cupon = CuponRedimido::create($data);

            return response()->json([
                'message' => 'Cupón redimido registrado con éxito.',
                'data' => $cupon
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Ocurrió un error inesperado al registrar el cupón.',
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function show($id)
    {
        $cupon = CuponRedimido::findOrFail($id);
        return response()->json($cupon);
    }

    public function update(Request $request, $id)
    {
        $cupon = CuponRedimido::findOrFail($id);

        $data = $request->validate([
            'id_usuario' => 'nullable|exists:users,id',
            'userId' => 'nullable|integer',
            'couponId' => 'nullable|integer',
            'comercioId' => 'nullable|integer',
        ]);

        $cupon->update($data);

        return response()->json([
            'message' => 'Cupon redimido actualizado correctamente.',
            'data' => $cupon
        ]);
    }

    public function destroy($id)
    {
        $cupon = CuponRedimido::findOrFail($id);
        $cupon->delete();

        return response()->json(['message' => 'Cupon redimido eliminado.']);
    }
}
