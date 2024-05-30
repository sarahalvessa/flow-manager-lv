<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index(): JsonResponse
    {
        $tarefas = Tarefa::all();
        return response()->json($tarefas, 200);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'usuario_id' => 'required|exists:tb_usuarios,usuario_id',
            'status_id' => 'required|exists:tb_status,status_id',
            'descricao' => 'required|string',
        ]);

        $tarefa = Tarefa::create($request->all());

        return response()->json($tarefa, 201);
    }

    public function show(Tarefa $tarefa): JsonResponse
    {
        return response()->json($tarefa, 200);
    }

    public function update(Request $request, Tarefa $tarefa): JsonResponse
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'usuario_id' => 'required|exists:tb_usuarios,usuario_id',
            'status_id' => 'required|exists:tb_status,status_id',
            'descricao' => 'required|string',
        ]);

        $tarefa->update($request->all());

        return response()->json($tarefa, 200);
    }

    public function destroy(Tarefa $tarefa): JsonResponse
    {
        $tarefa->delete();

        return response()->json(null, 204);
    }
};
