<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'tb_usuarios';
    protected $primaryKey = 'usuario_id';
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];
}
