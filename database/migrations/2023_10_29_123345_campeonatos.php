<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('campeonatos', function(Blueprint $table){
            $table->id();
            $table->string('titulo');
            $table->string('imagem');
            $table->string('cidade');
            $table->foreignId('estado_id')->constrained();
            $table->date('data');
            $table->text('sobre');
            $table->text('informacoes');
            $table->string('ginasio');
            $table->foreignId('tipo_id')->constrained();
            $table->foreignId('fase_id')->constrained();
            $table->boolean('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
