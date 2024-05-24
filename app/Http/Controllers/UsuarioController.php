<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UsuarioController extends Controller
{
    public function index(): JsonResponse
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:tb_usuarios,email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::create($request->all());

        return response()->json($usuario, 201);
    }

    public function show(Usuario $usuario): JsonResponse
    {
        return response()->json($usuario, 200);
    }

    public function update(Request $request, Usuario $usuario): JsonResponse
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
        ]);

        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    public function destroy(Usuario $usuario): JsonResponse
    {
        $usuario->delete();

        return response()->json(null, 204);
    }
}
