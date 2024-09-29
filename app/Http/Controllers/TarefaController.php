<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TarefaRequest;

class TarefaController extends Controller
{
    public function index(): JsonResponse
    {
        $tarefas = Tarefa::all();
        return response()->json($tarefas, 200);
    }

    public function store(TarefaRequest $request): JsonResponse
    {
        $request->validate();

        $tarefa = Tarefa::create($request->all());

        return response()->json($tarefa, 201);
    }

    public function show(Tarefa $tarefa): JsonResponse
    {
        return response()->json($tarefa, 200);
    }

    public function update(TarefaRequest $request, Tarefa $tarefa): JsonResponse
    {
        $request->validate();

        $tarefa->update($request->all());

        return response()->json($tarefa, 200);
    }

    public function destroy(Tarefa $tarefa): JsonResponse
    {
        $tarefa->delete();

        return response()->json(null, 204);
    }
};
