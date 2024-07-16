<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api');

Route::get('/carros', [CarroController::class, 'index']);
Route::get('/carros/{id}', [CarroController::class, 'show']);

// Route::middleware(['jwt.auth', 'funcionario'])->group(function () {
  Route::post('/carros', [CarroController::class, 'store']);
  Route::put('/carros/{id}', [CarroController::class, 'update']);
  Route::delete('/carros/{id}', [CarroController::class, 'destroy']);
// });

Route::middleware(['jwt.auth', 'funcionario'])->group(function () {
  Route::post('/empresas', [EmpresaController::class, 'store']);
});

