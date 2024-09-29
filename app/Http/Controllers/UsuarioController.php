<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    public function index(): JsonResponse
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios, 200);
    }

    public function store(UsuarioRequest $request): JsonResponse
    {
        $request->validate();

        $usuario = Usuario::create($request->all());

        return response()->json($usuario, 201);
    }

    public function show($usuarioId): JsonResponse
    {
        $usuario = Usuario::with('tarefas')->findOrFail($usuarioId);
        return response()->json($usuario, 200);
    }

    public function update(UsuarioRequest $request, Usuario $usuario): JsonResponse
    {
        $request->validate();

        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    public function destroy(Usuario $usuario): JsonResponse
    {
        $usuario->delete();

        return response()->json(null, 204);
    }
}
