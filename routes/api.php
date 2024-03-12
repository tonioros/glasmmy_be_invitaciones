<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConfirmacionController;
use App\Http\Controllers\Api\InvitacionController;
use App\Http\Controllers\Api\InvitadoController;
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


Route::post('/login', [AuthController::class,'login']);

// Para todo publico -> confirmacion
Route::post('/confirmacion', [ConfirmacionController::class, 'store']);
Route::get('/confirmacion/{access_token}', [ConfirmacionController::class, 'show']);
Route::get('/invitados/{access_token}', [InvitadoController::class, 'show']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/invitacion', [InvitacionController::class,'index']);
    Route::get('/invitados', [InvitadoController::class,'index']);
    Route::post('/invitados', [InvitadoController::class,'store']);
    Route::get('/invitadosYConfirmados', [InvitadoController::class,'confirmadosEInvitados']);
    Route::post('/invitadosExportar', [InvitadoController::class,'export']);
});
