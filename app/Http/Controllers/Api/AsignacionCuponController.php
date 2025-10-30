<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AsignacionCupon;
use App\Models\Cupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

/**
 * @group Gestión de Asignaciones de Cupones ADM
 *
 * Endpoints para manejar la asignación, canje y consulta de cupones.
 */
class AsignacionCuponController extends Controller
{
    /**
     * Listar todas las asignaciones
     *
     * Obtiene todas las asignaciones de cupones con su información relacionada.
     *
     * @response 200 scenario="Éxito" [
     *   {
     *      "id": 1,
     *      "cupon_id": 2,
     *      "user_id": 5,
     *      "fecha_canje": "2025-10-29",
     *      "cupon": {"codigo": "ABC123"},
     *      "user": {"name": "Juan"},
     *      "almacen": {"nombre": "Sucursal Central"}
     *   }
     * ]
     */
    public function index()
    {
        $asignaciones = AsignacionCupon::with(['cupon', 'user', 'almacen'])->latest()->get();
        return response()->json($asignaciones);
    }

    /**
     * Mostrar asignación por ID
     *
     * Obtiene una asignación específica.
     *
     * @urlParam id integer required El ID de la asignación.
     * @response 200 scenario="Éxito" {
     *   "id": 1,
     *   "cupon": {"codigo": "ABC123"},
     *   "user": {"name": "Juan"},
     *   "almacen": {"nombre": "Sucursal Central"}
     * }
     * @response 404 scenario="No encontrado" {"message": "Asignación no encontrada."}
     */
    public function show($id)
    {
        try {
            $asignacion = AsignacionCupon::with(['cupon', 'user', 'almacen'])->find($id);
            if (!$asignacion) {
                return response()->json(['message' => 'Asignación no encontrada.'], 404);
            }
            return response()->json($asignacion);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener asignación.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear una nueva asignación (canje de cupón)
     *
     * Crea una relación entre un usuario y un cupón.  
     * Si el cupón ya fue canjeado por el mismo usuario, se devolverá un error 409.
     * @group Z Flujo de Redimición de Clientes
     * @bodyParam cupon_id integer required ID del cupón a asignar. Example: 12
     * @bodyParam user_id integer optional ID del usuario (si está autenticado). Example: 5
     * @bodyParam userId integer optional ID alternativo del usuario (desde app externa). Example: 101
     * @bodyParam comercio_id integer optional ID del comercio donde se canjeó. Example: 3
     * @bodyParam fecha_canje date optional Fecha del canje. Example: 2025-10-29
     *
     * @response 201 scenario="Éxito" {
     *   "message": "Cupón asignado correctamente.",
     *   "data": {"id": 1, "cupon_id": 12, "user_id": 5, "fecha_canje": "2025-10-29"}
     * }
     * @response 409 scenario="Duplicado" {"message": "El usuario ya canjeó este cupón."}
     * @response 422 scenario="Validación" {"message": "Debe proporcionar al menos user_id o userId."}
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'cupon_id'    => 'required|exists:cupones,id',
                'user_id'     => 'nullable|exists:users,id',
                'userId'      => 'nullable|integer',
                'comercio_id' => 'nullable|exists:comercios,id',
                'fecha_canje' => 'nullable|date',
            ]);

            if (empty($request->user_id) && empty($request->userId)) {
                return response()->json(['message' => 'Debe proporcionar al menos user_id o userId.'], 422);
            }

            $exists = AsignacionCupon::where('cupon_id', $request->cupon_id)
                ->where(function ($q) use ($request) {
                    if ($request->user_id) $q->where('user_id', $request->user_id);
                    if ($request->userId) $q->orWhere('userId', $request->userId);
                })
                ->exists();

            if ($exists) {
                return response()->json(['message' => 'El usuario ya canjeó este cupón.'], 409);
            }

            $data = [
                'cupon_id'    => $request->cupon_id,
                'fecha_canje' => $request->fecha_canje ?? now(),
                'comercio_id' => $request->comercio_id,
                'user_id'     => $request->user_id,
                'userId'      => $request->userId,
            ];

            $asignacion = AsignacionCupon::create($data);

            return response()->json(['message' => 'Cupón asignado correctamente.', 'data' => $asignacion], 201);

        } catch (ValidationException $e) {
            return response()->json(['message' => 'Error de validación.', 'errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear asignación.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Crear asignación mediante DNI + código
     *
     * Permite asignar un cupón usando el código del cupón y el DNI del usuario.
     *
     * @bodyParam codigo string required Código del cupón. Example: ABC123
     * @bodyParam dni string required DNI del usuario. Example: 7896541
     * @bodyParam almacen_id integer required ID del comercio donde se realiza el canje. Example: 4
     * @bodyParam fecha_canje date optional Fecha del canje. Example: 2025-10-29
     *
     * @response 201 scenario="Éxito" {
     *   "id": 1,
     *   "cupon_id": 5,
     *   "user_id": 12,
     *   "fecha_canje": "2025-10-29"
     * }
     * @response 409 scenario="Duplicado" {"message": "El usuario ya canjeó este cupón."}
     */
    public function storeDni(Request $request)
    {
        try {
            $request->validate([
                'codigo'      => 'required|exists:cupones,codigo',
                'dni'         => 'required|exists:users,dni',
                'almacen_id'  => 'required|exists:comercios,id',
                'fecha_canje' => 'nullable|date',
            ]);

            $cupon = Cupon::where('codigo', $request->codigo)->first();
            $user = User::where('dni', $request->dni)->first();

            if (!$cupon || !$user) {
                return response()->json(['message' => 'Cupón o usuario no encontrado.'], 404);
            }

            $exists = AsignacionCupon::where('cupon_id', $cupon->id)
                ->where('user_id', $user->id)
                ->exists();

            if ($exists) {
                return response()->json(['message' => 'El usuario ya canjeó este cupón.'], 409);
            }

            $asignacion = AsignacionCupon::create([
                'cupon_id'    => $cupon->id,
                'user_id'     => $user->id,
                'comercio_id' => $request->almacen_id,
                'fecha_canje' => $request->fecha_canje ?? now(),
            ]);

            return response()->json($asignacion, 201);

        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al crear asignación.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Eliminar asignación
     *
     * @urlParam id integer required ID de la asignación. Example: 7
     * @response 200 {"message": "Asignación eliminada correctamente."}
     * @response 404 {"message": "Asignación no encontrada."}
     */
    public function destroy($id)
    {
        try {
            $asignacion = AsignacionCupon::find($id);
            if (!$asignacion) {
                return response()->json(['message' => 'Asignación no encontrada.'], 404);
            }
            $asignacion->delete();
            return response()->json(['message' => 'Asignación eliminada correctamente.']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al eliminar asignación.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Cupones por usuario
     *
     * Obtiene los cupones asignados a un usuario.
     *
     * @urlParam id integer required ID del usuario. Example: 5
     */
    public function cuponesPorUsuario($id)
    {
        try {
            $asignaciones = AsignacionCupon::with(['cupon.campania', 'almacen'])
                ->where('user_id', $id)
                ->orWhere('userId', $id)
                ->get();

            if ($asignaciones->isEmpty()) {
                return response()->json(['message' => 'El usuario no tiene cupones asignados.'], 404);
            }

            return response()->json($asignaciones);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener cupones del usuario.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Cupones por campaña y almacén
     *
     * @bodyParam campania_id integer required ID de la campaña. Example: 2
     * @bodyParam almacen_id integer required ID del comercio. Example: 4
     */
    public function asignacionesPorCampaniaYAlmacen(Request $request)
    {
        try {
            $request->validate([
                'campania_id' => 'required|exists:campanias,id',
                'almacen_id'  => 'required|exists:comercios,id',
            ]);

            $asignaciones = AsignacionCupon::with(['cupon.campania', 'user', 'almacen'])
                ->where('comercio_id', $request->almacen_id)
                ->whereHas('cupon', fn($q) => $q->where('campania_id', $request->campania_id))
                ->get();

            return response()->json($asignaciones);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener asignaciones.', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * Cupones reclamados por usuario (rango de fechas)
     *
     * @bodyParam user_id integer required ID del usuario. Example: 8
     * @bodyParam fecha_inicio date required Fecha inicial (YYYY-MM-DD). Example: 2025-10-01
     * @bodyParam fecha_fin date required Fecha final (YYYY-MM-DD). Example: 2025-10-31
     */
    public function cuponesReclamadosPorUsuario(Request $request)
    {
        try {
            $request->validate([
                'user_id'      => 'required|exists:users,id',
                'fecha_inicio' => 'required|date',
                'fecha_fin'    => 'required|date|after_or_equal:fecha_inicio',
            ]);

            $fecha_inicio = $request->fecha_inicio . ' 00:00:00';
            $fecha_fin = $request->fecha_fin . ' 23:59:59';

            $asignaciones = AsignacionCupon::with(['cupon.campania', 'almacen'])
                ->where(function ($q) use ($request) {
                    $q->where('user_id', $request->user_id)
                      ->orWhere('userId', $request->user_id);
                })
                ->whereBetween('fecha_canje', [$fecha_inicio, $fecha_fin])
                ->get();

            if ($asignaciones->isEmpty()) {
                return response()->json(['message' => 'No se encontraron cupones reclamados en ese rango.'], 404);
            }

            return response()->json($asignaciones);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener los cupones reclamados.', 'error' => $e->getMessage()], 500);
        }
    }
}
