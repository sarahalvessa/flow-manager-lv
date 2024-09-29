<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('Personal Access Token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'usuario_id' => $user->usuario_id
            ]);
        };

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();
    
        if (!$user) {
            return response()->json(['error' => 'User not authenticated'], 401);
        }
        $user->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function register(AuthRequest $request)
    {
        $validator = Validator::make($request->all());

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $user = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'mensagem' => 'Usuário registrado com sucesso'
        ], 201);
    }
}
