<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tb_status', function (Blueprint $table) {
            $table->id('status_id');
            $table->string('status');
            $table->timestamps();
        });

        DB::table('tb_status')->insert([
            ['status' => 'para fazer'],
            ['status' => 'em progresso'],
            ['status' => 'finalizado']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_status');
    }
};
