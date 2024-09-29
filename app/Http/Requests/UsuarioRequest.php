<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'nome' => 'required',
            'email' => 'required',
            'senha' => 'required',
        ];
    }
}
