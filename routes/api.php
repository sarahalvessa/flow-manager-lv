<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\StatusController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
return $request->user();
});

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('tarefas', TarefaController::class);
Route::apiResource('status', StatusController::class);
