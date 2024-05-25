<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function tarefas(): HasMany
    {
        return $this->hasMany(Tarefa::class, 'usuario_id', 'usuario_id');
    }
}
