<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules()
    {
        if ($this->routeIs('login')) {
            return [
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|min:8',
            ];
        }

        return [
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tb_usuarios',
            'password' => 'required|string|min:8',
        ];
    }
}
