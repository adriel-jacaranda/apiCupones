<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Exception;

/**
 * Controlador de Autenticación y Usuarios
 *
 * Contiene endpoints para autenticación (registro, login, logout, refresh) y gestión de usuarios.
 * 
 * Todos los endpoints de autenticación usan tokens Bearer.
 */
class AuthController extends Controller
{
    /**
     * @group Autenticación ADM

     *
     * Registrar un nuevo usuario
     *
     * Crea un nuevo usuario en el sistema y devuelve un token de autenticación.
     *
     * @bodyParam name string required Nombre del usuario. Example: Juan
     * @bodyParam nombre_completo string Nombre completo del usuario. Example: Juan Pérez
     * @bodyParam celular string Número de celular del usuario. Example: 77712345
     * @bodyParam direccion string Dirección del usuario. Example: Av. Pando 123
     * @bodyParam email string required Correo electrónico. Example: juan@correo.com
     * @bodyParam password string required Contraseña del usuario. Example: 123456
     * @bodyParam password_confirmation string required Confirmación de la contraseña. Example: 123456
     * @bodyParam rol string Rol del usuario (admin, cliente, gestionador, almacen). Example: cliente
     * @bodyParam id_tipo_cliente integer ID del tipo de cliente. Example: 2
     * @bodyParam id_almacen integer ID del almacén asociado. Example: 5
     *
     * @response 201 {
     *   "access_token": "1|xxxxxxx",
     *   "token_type": "Bearer",
     *   "user": {
     *     "id": 1,
     *     "name": "Juan",
     *     "email": "juan@correo.com"
     *   }
     * }
     */
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
                'id_almacen' => 'nullable|exists:almacenes,id',
            ]);

            $user = User::create([
                'name' => $request->name,
                'nombre_completo' => $request->nombre_completo,
                'celular' => $request->celular,
                'direccion' => $request->direccion,
                'email' => $request->email,
                'status' => $request->status,
                'password' => Hash::make($request->password),
                'rol' => $request->rol ?? 'cliente',
                'token_id' => $request->token_id,
                'userId' => $request->userId,
                'id_tipo_cliente' => $request->id_tipo_cliente,
                'id_almacen' => $request->id_almacen,
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 201);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al registrar usuario', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Autenticación ADM
     *
     * Iniciar sesión
     *
     * Verifica las credenciales del usuario y devuelve un token de acceso Bearer.
     *
     * @bodyParam email string required Correo electrónico del usuario. Example: juan@correo.com
     * @bodyParam password string required Contraseña del usuario. Example: 123456
     *
     * @response 200 {
     *   "access_token": "1|xxxxxxx",
     *   "token_type": "Bearer",
     *   "user": {
     *     "id": 1,
     *     "name": "Juan",
     *     "email": "juan@correo.com"
     *   }
     * }
     */
    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            $user = User::where('email', $request->email)->first();

            if (! $user || ! Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    'email' => ['Las credenciales son incorrectas.'],
                ]);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error en el login', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Autenticación ADM
     *
     * Cerrar sesión
     *
     * Elimina el token de acceso actual del usuario autenticado.
     *
     * @authenticated
     *
     * @response 200 {
     *   "message": "Sesión cerrada"
     * }
     */
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

    /**
     * @group Autenticación ADM
     *
     * Obtener información del usuario autenticado
     *
     * Devuelve los datos del usuario autenticado junto con sus relaciones `tipoCliente` y `almacen`.
     *
     * @authenticated
     */
    public function me(Request $request)
    {
        try {
            $user = $request->user()->load(['tipoCliente', 'almacen']);
            return response()->json(['user' => $user], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error al obtener información del usuario', 'error' => $e->getMessage()], 500);
        }
    }

    /**
     * @group Autenticación ADM
     *
     * Listar todos los usuarios
     *
     * Devuelve una lista de todos los usuarios registrados con sus relaciones.
     *
     * @authenticated
     */
    public function index()
    {
        $users = User::with(['tipoCliente', 'almacen'])->get();
        return response()->json(['users' => $users], 200);
    }

    /**
     * @group Autenticación ADM
     *
     * Eliminar un usuario
     *
     * Elimina un usuario existente por su ID.
     *
     * @authenticated
     * @urlParam id integer required ID del usuario a eliminar. Example: 1
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }

            $user->delete();
            return response()->json(['message' => 'Usuario eliminado correctamente'], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al eliminar usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @group Autenticación ADM
     *
     * Actualizar un usuario existente
     *
     * Permite modificar los datos de un usuario (nombre, correo, rol, contraseña, etc.).
     *
     * @authenticated
     * @urlParam id integer required ID del usuario a actualizar. Example: 1
     */
    public function update(Request $request, $id)
    {
        try {
            $user = User::find($id);

            if (!$user) {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
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
                'id_almacen' => 'nullable|exists:almacenes,id',
            ]);

            $user->fill($request->except('password'));

            if ($request->filled('password')) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'user' => $user,
            ], 200);
        } catch (ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error al actualizar usuario',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /**
     * @group Autenticación ADM
     *
     * Refrescar token de autenticación
     *
     * Revoca el token actual y genera uno nuevo.
     *
     * @authenticated
     */
    public function refreshToken(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json(['message' => 'Usuario no autenticado'], 401);
            }

            $request->user()->currentAccessToken()->delete();
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
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
