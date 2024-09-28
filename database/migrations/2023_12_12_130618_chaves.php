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
        Schema::create('chaves', function(Blueprint $table){
            $table->id();
            $table->foreignId('campeonato_id')->constrained();
            $table->integer('numeroLuta');
            $table->string('lutador_1')->nullable();
            $table->string('lutador_2')->nullable();            
            $table->string('vencedor')->nullable();
            $table->foreignId('sexo_id')->constrained();
            $table->foreignId('faixa_id')->constrained();
            $table->foreignId('peso_id')->constrained();
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
