<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AsignacionCupon;
use App\Models\Cupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class AsignacionCuponController extends Controller
{
    public function index()
    {
        $asignaciones = AsignacionCupon::with(['cupon', 'user', 'almacen'])->latest()->get();
        return response()->json($asignaciones);
    }

    public function show($id)
    {
        try {
            $asignacion = AsignacionCupon::with(['cupon', 'user', 'almacen'])->find($id);

            if (!$asignacion) {
                return response()->json(['message' => 'Asignación no encontrada.'], 404);
            }

            return response()->json($asignacion);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener asignación.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


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
                return response()->json([
                    'message' => 'Debe proporcionar al menos user_id o userId.'
                ], 422);
            }

            $exists = AsignacionCupon::where('cupon_id', $request->cupon_id)
                ->where(function ($query) use ($request) {
                    if (!empty($request->user_id)) {
                        $query->where('user_id', $request->user_id);
                    }
                    if (!empty($request->userId)) {
                        $query->orWhere('userId', $request->userId);
                    }
                })
                ->exists();

            if ($exists) {
                return response()->json([
                    'message' => 'El usuario ya canjeó este cupón.'
                ], 409);
            }

            $data = [
                'cupon_id'    => $request->cupon_id,
                'fecha_canje' => $request->fecha_canje ?? now(),
                'comercio_id' => $request->comercio_id,
            ];

            if (!empty($request->user_id)) {
                $data['user_id'] = $request->user_id;
            }

            if (!empty($request->userId)) {
                $data['userId'] = $request->userId;
            }

            $asignacion = AsignacionCupon::create($data);

            return response()->json([
                'message' => 'Cupón asignado correctamente.',
                'data' => $asignacion
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Error de validación.',
                'errors' => $e->errors()
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al crear asignación.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function storeDni(Request $request)
    {
        try {
            $request->validate([
                'codigo'      => 'required|exists:cupones,codigo',
                'dni'         => 'required|exists:users,dni',
                'almacen_id'  => 'required|exists:almacenes,id',
                'fecha_canje' => 'nullable|date',
            ]);

            $cupon = Cupon::where('codigo', $request->codigo)->with('campania')->first();
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
            return response()->json([
                'message' => 'Error al crear asignación.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

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
            return response()->json([
                'message' => 'Error al eliminar asignación.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


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
            return response()->json([
                'message' => 'Error al obtener cupones del usuario.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

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
            return response()->json([
                'message' => 'Error al obtener asignaciones.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }


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

            return response()->json($asignaciones, 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener los cupones reclamados.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
