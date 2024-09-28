<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\Auth\AuthController;

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('usuarios', UsuarioController::class);
    Route::apiResource('tarefas', TarefaController::class);
    Route::apiResource('status', StatusController::class);
    Route::post('logout', [AuthController::class, 'logout']);
});
