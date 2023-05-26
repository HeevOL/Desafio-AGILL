<?php

use App\Http\Controllers\AlugueisController;
use App\Http\Controllers\ImoveisController;
use App\Http\Controllers\LocadoresController;
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

Route::post('/locador', [LocadoresController::class, 'store']);

Route::get('/lista-imoveis', [ImoveisController::class, 'index']);
Route::get('/lista-imoveis/{id}', [ImoveisController::class, 'show']);
// Route::apiResource('lista-imoveis', ImoveisController::class);

Route::post('/realizar-locacao', [AlugueisController::class, 'store']);
Route::put('/cancelar-locacao/{id}', [AlugueisController::class, 'cancelarLocacao']);
Route::put('/iniciar-estadia/{id}', [AlugueisController::class, 'iniciarEstadia']);
Route::put('/finalizar-estadia/{id}', [AlugueisController::class, 'finalizarEstadia']);
Route::get('/historico-locatario/{id}', [AlugueisController::class, 'historicoLocatario']);
Route::get('/historico-locador/{id}', [AlugueisController::class, 'historicoLocador']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
