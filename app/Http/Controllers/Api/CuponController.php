<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;
use Illuminate\Support\Facades\DB;

class CuponController extends Controller
{
    /**
     * Listar todos los cupones
     * 
     * @group Cupones ADM
     * @response 200 scenario="Lista exitosa" [{"id":1,"codigo":"ABC123","campania_id":2,"created_at":"..."}]
     */
    public function index()
    {
        $cupones = Cupon::with('campania')->get();
        return response()->json($cupones);
    }

    /**
     * Listado extendido con información de usuarios que reclamaron
     * 
     * @group Cupones ADM
     */
    public function indexAll()
    {
        $cupones = Cupon::with(['asignaciones.user'])
            ->get()
            ->map(function ($cupon) {
                return [
                    'id' => $cupon->id,
                    'codigo' => $cupon->codigo,
                    'comercio_id' => $cupon->campania_id,
                    'created_at' => $cupon->created_at,
                    'updated_at' => $cupon->updated_at,
                    'infoQr' => 'https://jacaranda.com.ar/#/cupones/codigo/' . $cupon->codigo,
                    'usuarios_reclamaron' => $cupon->asignaciones->map(function ($asignacion) {
                        return [
                            'id' => $asignacion->user->id,
                            'name' => $asignacion->user->name,
                            'email' => $asignacion->user->email,
                            'fecha_canje' => $asignacion->fecha_canje,
                        ];
                    }),
                ];
            });

        return response()->json($cupones);
    }

    /**
     * Mostrar un cupón por ID
     * 
     * @group Cupones ADM
     * @urlParam id integer required ID del cupón
     */
    public function show($id)
    {
        try {
            $cupon = Cupon::with('campania')->find($id);
            if (!$cupon) {
                return response()->json(['message' => 'Cupón no encontrado'], 404);
            }
            return response()->json($cupon);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener cupón',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Crear un nuevo cupón manual
     * 
     * @group Cupones ADM
     * @bodyParam codigo string required Código único del cupón.
     * @bodyParam campania_id integer required ID de la campaña a la que pertenece.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'codigo' => 'required|string|unique:cupones,codigo',
                'campania_id' => 'required|exists:campanias,id',
            ]);

            $cupon = Cupon::create([
                'codigo' => strtoupper($request->codigo),
                'campania_id' => $request->campania_id,
            ]);

            return response()->json($cupon, 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear cupón',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Actualizar un cupón
     * 
     * @group Cupones ADM
     * @urlParam id integer required ID del cupón
     * @bodyParam codigo string Código único del cupón.
     * @bodyParam campania_id integer ID de la campaña.
     */
    public function update(Request $request, $id)
    {
        try {
            $cupon = Cupon::find($id);
            if (!$cupon) {
                return response()->json(['message' => 'Cupón no encontrado'], 404);
            }

            $request->validate([
                'codigo' => 'sometimes|required|string|unique:cupones,codigo,' . $id,
                'campania_id' => 'sometimes|required|exists:campanias,id',
            ]);

            $cupon->update($request->all());

            return response()->json($cupon);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar cupón',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Eliminar un cupón
     * 
     * @group Cupones ADM
     * @urlParam id integer required ID del cupón
     */
    public function destroy($id)
    {
        try {
            $cupon = Cupon::find($id);
            if (!$cupon) {
                return response()->json(['message' => 'Cupón no encontrado'], 404);
            }

            $cupon->delete();

            return response()->json(['message' => 'Cupón eliminado correctamente']);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar cupón',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Obtener cupones por campaña
     * 
     * @group Cupones ADM
     * @urlParam campania_id integer required ID de la campaña
     */
    public function getByCampania($campania_id)
    {
        try {
            $cupones = Cupon::with('campania')
                ->where('campania_id', $campania_id)
                ->get();

            if ($cupones->isEmpty()) {
                return response()->json(['message' => 'No hay cupones para esta campaña'], 404);
            }

            return response()->json($cupones);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener cupones por campaña',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Buscar cupón por código y traer campaña + almacenes
     * 
     * @group Cupones ADM
     * @urlParam codigo string required Código del cupón
     */
    public function getByCodigo($codigo)
    {
        try {
            $cupon = Cupon::with([
                'campania.almacenes'
            ])->where('codigo', strtoupper($codigo))->first();

            if (!$cupon) {
                return response()->json(['message' => 'Cupón no encontrado'], 404);
            }

            return response()->json($cupon);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener cupón',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
