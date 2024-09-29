<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarefaRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required|string|max:255',
            'usuario_id' => 'required|exists:tb_usuarios,usuario_id',
            'status_id' => 'required|exists:tb_status,status_id',
            'descricao' => 'required|string',
        ];
    }
}
