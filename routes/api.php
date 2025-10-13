<?php

use App\Http\Controllers\Api\AsignacionCuponController;
use App\Http\Controllers\Api\CampaniaController;
use App\Http\Controllers\Api\ComercioController;
use App\Http\Controllers\Api\CuponController;
use App\Http\Controllers\Api\TipoClienteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaAlmacenController;
use App\Http\Controllers\CuponRedimidoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/test', function () {
    return response()->json(true);
});

Route::get('/campaniasComer', [CampaniaController::class, 'indexAll']);
Route::post('/cupones/reclamados', [AsignacionCuponController::class, 'cuponesReclamadosPorUsuario']);



Route::get('/loadServices', [CategoriaAlmacenController::class, 'index']);
Route::get('/comercio/categoria/{categoriaId}', [ComercioController::class, 'porCategoria']);
Route::get('/comercio-web', [ComercioController::class, 'indexW']);
Route::get('/comercio/{id}/campanias', [ComercioController::class, 'campaniasDeAlmacen']);

// Rutas protegidas
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/usuarios', [AuthController::class, 'index']);
    Route::get('/usuarios/almacen/{idAlmacen}', [AuthController::class, 'getUsuariosPorAlmacen']);
    Route::get('/cupones/codigo/{codigo}', [CuponController::class, 'getByCodigo']);
    Route::get('/cuponesComer', [CuponController::class, 'indexAll']);

    Route::delete('/usuarios/{id}', [AuthController::class, 'destroy']);
    Route::put('/usuarios/{id}', [AuthController::class, 'update']);

    Route::post('/logout', [AuthController::class, 'logout']);



    Route::middleware('auth:sanctum')->group(function () {

        Route::prefix('tipo-cliente')->group(function () {
            Route::get('/', [TipoClienteController::class, 'index']);
            Route::post('/', [TipoClienteController::class, 'store']);
            Route::get('/{id}', [TipoClienteController::class, 'show']);
            Route::put('/{id}', [TipoClienteController::class, 'update']);
            Route::delete('/{id}', [TipoClienteController::class, 'destroy']);
        });
        Route::prefix('campanias')->group(function () {
            Route::get('/', [CampaniaController::class, 'index']);
            Route::post('/', [CampaniaController::class, 'store']);
            Route::get('/{id}', [CampaniaController::class, 'show']);
            Route::post('/{id}', [CampaniaController::class, 'update']);
            Route::delete('/{id}', [CampaniaController::class, 'destroy']);
            Route::get('/tipo-cliente/{id_tipo_cliente}', [CampaniaController::class, 'campaniasPorTipoCliente']);
            Route::post('/{campania}/almacenes', [CampaniaController::class, 'asociarAlmacenes']);
            Route::get('/almacenes/{id}/campanias', [CampaniaController::class, 'getCampaniasPorAlmacen']);
        });

        Route::prefix('cupones')->group(function () {
            Route::get('/', [CuponController::class, 'index']);
            Route::get('/campania/{campania_id}', [CuponController::class, 'getByCampania']);
            Route::post('/', [CuponController::class, 'store']);
            Route::get('/{id}', [CuponController::class, 'show']);
            Route::put('/{id}', [CuponController::class, 'update']);
            Route::delete('/{id}', [CuponController::class, 'destroy']);
            Route::get('/cupones-usuario/{id}', [AsignacionCuponController::class, 'cuponesPorUsuario']);
        });

        Route::prefix('asignaciones')->group(function () {
            Route::get('/', [AsignacionCuponController::class, 'index']);
            Route::post('/', [AsignacionCuponController::class, 'store']);
            Route::post('/cupon', [AsignacionCuponController::class, 'storeDni']);
            Route::get('/{id}', [AsignacionCuponController::class, 'show']);
            Route::delete('/{id}', [AsignacionCuponController::class, 'destroy']);
            Route::post('/filtrar', [AsignacionCuponController::class, 'asignacionesPorCampaniaYAlmacen']);
        });
    });

    Route::prefix('almacenes')->group(function () {
        Route::get('/', [ComercioController::class, 'index']);
        Route::post('/', [ComercioController::class, 'store']);
        Route::get('/{id}', [ComercioController::class, 'show']);
        Route::post('/{id}', [ComercioController::class, 'update']);
        Route::delete('/{id}', [ComercioController::class, 'destroy']);
    });

    Route::prefix('categoria-almacen')->group(function () {
        Route::get('/', [CategoriaAlmacenController::class, 'index']);
        Route::post('/', [CategoriaAlmacenController::class, 'store']);
        Route::get('/{id}', [CategoriaAlmacenController::class, 'show']);
        Route::post('/{id}', [CategoriaAlmacenController::class, 'update']);
        Route::delete('/{id}', [CategoriaAlmacenController::class, 'destroy']);
    });

    Route::prefix('cupones-redimidos')->group(function () {
    Route::get('/', [CuponRedimidoController::class, 'index']);

    Route::get('/user/{userId}', [CuponRedimidoController::class, 'porUserId']);

    Route::post('/', [CuponRedimidoController::class, 'store']);

    Route::get('/{id}', [CuponRedimidoController::class, 'show']);

    Route::put('/{id}', [CuponRedimidoController::class, 'update']);

    Route::delete('/{id}', [CuponRedimidoController::class, 'destroy']);
});
});
