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
        Schema::create('resultados', function (Blueprint $table) {
            //$table->id();
            $table->foreignId('campeonato_id')->constrained();
            $table->foreignId('sexo_id')->constrained();
            $table->foreignId('faixa_id')->constrained();
            $table->foreignId('peso_id')->constrained();
            $table->string('primeiroColocado');
            $table->string('segundoColocado');
            $table->string('terceiroColocado');
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
