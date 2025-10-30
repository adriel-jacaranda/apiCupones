<?php

namespace App\Http\Controllers;

use App\Models\CuponRedimido;
use Illuminate\Http\Request;

/**
 * @group Cupones Redimidos
 *
 * Endpoints para gestionar los cupones redimidos por los usuarios.
 */
class CuponRedimidoController extends Controller
{
    /**
     * Listar todos los cupones redimidos
     *
     * Muestra todos los registros de cupones redimidos, junto con el usuario, cupón y comercio asociados.
     *
     * @response 200 {
     *   "message": "Lista de cupones redimidos obtenida correctamente.",
     *   "data": [
     *     {
     *       "id": 1,
     *       "id_usuario": 5,
     *       "userId": "fb_19823",
     *       "couponId": 10,
     *       "comercioId": 3,
     *       "created_at": "2025-10-25T18:22:14.000000Z"
     *     }
     *   ]
     * }
     */
    public function index()
    {
        $cupones = CuponRedimido::with('usuario')->latest()->get();
        return response()->json($cupones);
    }

    /**
     * Obtener cupones redimidos por usuario
     *
     * Devuelve todos los cupones redimidos asociados a un usuario específico.
     *
     * @urlParam userId string required El identificador del usuario (por ejemplo, "fb_19823").
     * @group Z Flujo de Redimición de Clientes
     * @response 200 {
     *   "message": "Cupones redimidos encontrados.",
     *   "data": [
     *     {
     *       "id": 1,
     *       "couponId": 10,
     *       "comercioId": 3,
     *       "created_at": "2025-10-25T18:22:14.000000Z"
     *     }
     *   ]
     * }
     *
     * @response 404 {
     *   "message": "No se encontraron cupones redimidos para este usuario.",
     *   "data": []
     * }
     */
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

    /**
     * Registrar un nuevo cupón redimido
     * @group Z Flujo de Redimición de Clientes
     * Guarda un nuevo registro de cupón redimido por un usuario.
     *
     * @bodyParam id_usuario integer nullable ID del usuario autenticado (si aplica). Example: 5
     * @bodyParam userId string nullable ID del usuario externo (por ejemplo, Firebase). Example: fb_19823
     * @bodyParam couponId integer required ID del cupón que se está redimiendo. Example: 10
     * @bodyParam comercioId integer nullable ID del comercio asociado al cupón. Example: 3
     *
     * @response 201 {
     *   "message": "Cupón redimido registrado con éxito.",
     *   "data": {
     *     "id": 1,
     *     "couponId": 10,
     *     "userId": "fb_19823",
     *     "created_at": "2025-10-25T18:22:14.000000Z"
     *   }
     * }
     *
     * @response 409 {
     *   "message": "Este cupón ya fue redimido por este usuario."
     * }
     *
     * @response 422 {
     *   "message": "Error de validación.",
     *   "errors": {
     *     "couponId": ["El campo couponId es obligatorio."]
     *   }
     * }
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'id_usuario' => 'nullable|exists:users,id',
                'userId' => 'nullable',
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

    /**
     * Mostrar un cupón redimido específico
     *
     * Devuelve la información de un cupón redimido por su ID.
     *
     * @urlParam id integer required El ID del cupón redimido. Example: 1
     *
     * @response 200 {
     *   "id": 1,
     *   "couponId": 10,
     *   "comercioId": 3,
     *   "created_at": "2025-10-25T18:22:14.000000Z"
     * }
     *
     * @response 404 {
     *   "message": "Cupón redimido no encontrado."
     * }
     */
    public function show($id)
    {
        $cupon = CuponRedimido::findOrFail($id);
        return response()->json($cupon);
    }

    /**
     * Actualizar un cupón redimido
     *
     * Permite modificar los datos de un cupón redimido existente.
     *
     * @urlParam id integer required El ID del cupón redimido. Example: 1
     *
     * @bodyParam id_usuario integer nullable ID del usuario autenticado (si aplica). Example: 5
     * @bodyParam userId string nullable ID del usuario externo (por ejemplo, Firebase). Example: fb_19823
     * @bodyParam couponId integer nullable ID del cupón asociado. Example: 10
     * @bodyParam comercioId integer nullable ID del comercio asociado. Example: 3
     *
     * @response 200 {
     *   "message": "Cupón redimido actualizado correctamente.",
     *   "data": {
     *     "id": 1,
     *     "couponId": 10,
     *     "userId": "fb_19823"
     *   }
     * }
     */
    public function update(Request $request, $id)
    {
        $cupon = CuponRedimido::findOrFail($id);

        $data = $request->validate([
            'id_usuario' => 'nullable|exists:users,id',
            'userId' => 'nullable',
            'couponId' => 'nullable|integer',
            'comercioId' => 'nullable|integer',
        ]);

        $cupon->update($data);

        return response()->json([
            'message' => 'Cupon redimido actualizado correctamente.',
            'data' => $cupon
        ]);
    }

    /**
     * Eliminar un cupón redimido
     *
     * Elimina un registro de cupón redimido existente.
     *
     * @urlParam id integer required El ID del cupón redimido. Example: 1
     *
     * @response 200 {
     *   "message": "Cupon redimido eliminado."
     * }
     *
     * @response 404 {
     *   "message": "Cupón redimido no encontrado."
     * }
     */
    public function destroy($id)
    {
        $cupon = CuponRedimido::findOrFail($id);
        $cupon->delete();

        return response()->json(['message' => 'Cupon redimido eliminado.']);
    }
}
