<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tb_tarefas', function (Blueprint $table) {
            $table->id('tarefa_id');
            $table->string('nome');
            $table->foreignId('usuario_id')->constrained('tb_usuarios', 'usuario_id')->onDelete('cascade');
            $table->text('descricao');
            $table->foreignId('status_id')->constrained('tb_status', 'status_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_tarefas');
    }
}
