<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'nombre_completo' => 'nullable|string|max:255',
                'celular' => 'nullable|string|max:20',
                'direccion' => 'nullable|string|max:255',
                'email' => 'required|email|string|unique:users,email',
                'password' => 'required|string|min:6|confirmed',
                'rol' => 'nullable|in:admin,cliente,gestionador,almacen',
                'token_id' => 'nullable|string',
                'status' => 'nullable|integer',
                'userId' => 'nullable|integer',
                'id_tipo_cliente' => 'nullable|exists:tipo_clientes,id',
                'id_almacen' => 'nullable|exists:almacenes,id', // Validación del nuevo campo
            ]);

            $user = User::create([
                'name' => $request->name,
                'nombre_completo' => $request->nombre_completo,
                'celular' => $request->celular,
                'direccion' => $request->direccion,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'rol' => $request->rol ?? 'cliente', // default cliente
                'token_id' => $request->token_id,
                'userId' => $request->userId,
                'id_tipo_cliente' => $request->id_tipo_cliente,
                'id_almacen' => $request->id_almacen, // Asignar almacen
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al registrar usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email'=> 'required|email',
                'password'=> 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Las credenciales son incorrectas.'],
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token'=> $token,
                'token_type'=> 'Bearer',
                'user' => $user,
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error en el login',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();

            return response()->json(['message' => 'Sesión cerrada'], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al cerrar sesión',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function me(Request $request)
    {
        try {
            $user = $request->user()->load(['tipoCliente', 'almacen']); // Carga también el almacen

            return response()->json([
                'user' => $user,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener información del usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function index()
    {
        try {
            $users = User::with(['tipoCliente', 'almacen'])->get(); // Incluye almacen

            return response()->json([
                'users' => $users,
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al obtener usuarios',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            $user->delete();

            return response()->json([
                'message' => 'Usuario eliminado correctamente'
            ], 200);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json([
                    'message' => 'Usuario no encontrado'
                ], 404);
            }

            $request->validate([
                'name' => 'required|string|max:255',
                'nombre_completo' => 'nullable|string|max:255',
                'celular' => 'nullable|string|max:20',
                'direccion' => 'nullable|string|max:255',
                'email' => 'nullable|email|string|unique:users,email,' . $user->id,
                'password' => 'nullable|string|min:6|confirmed',
                'rol' => 'nullable|in:admin,cliente,gestionador,almacen',
                'token_id' => 'nullable|string',
                'status' => 'nullable|integer',
                                'userId' => 'nullable|integer',

                'id_tipo_cliente' => 'nullable|exists:tipo_clientes,id',
                'id_almacen' => 'nullable|exists:almacenes,id', // Validación del nuevo campo
            ]);

            $user->name = $request->name;
            $user->nombre_completo = $request->nombre_completo;
            $user->celular = $request->celular;
            $user->direccion = $request->direccion;
            $user->status = $request->status ?? $user->status;
            $user->rol = $request->rol ?? $user->rol;
            $user->userId = $request->userId ?? $user->userId;
            $user->token_id = $request->token_id ?? $user->token_id;
            $user->id_tipo_cliente = $request->id_tipo_cliente ?? $user->id_tipo_cliente;
            $user->id_almacen = $request->id_almacen ?? $user->id_almacen;

            if ($request->email !== $user->email) {
                $user->email = $request->email;
            }

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'user' => $user,
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'errors' => $e->errors()
            ], 422);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function refreshToken(Request $request)
{
    try {
        // Obtener el usuario autenticado
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'message' => 'Usuario no autenticado',
            ], 401);
        }

        // Eliminar el token actual para evitar duplicados
        $request->user()->currentAccessToken()->delete();

        // Crear un nuevo token (validez según config/sanctum.php => 30 días)
        $newToken = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $newToken,
            'token_type' => 'Bearer',
            'user' => $user,
            'message' => 'Token renovado correctamente',
        ], 200);

    } catch (Exception $e) {
        return response()->json([
            'message' => 'Error al refrescar el token',
            'error' => $e->getMessage(),
        ], 500);
    }
}

}
