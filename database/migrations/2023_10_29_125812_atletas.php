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
        Schema::create('atletas', function (Blueprint $table){
            $table->id();
            $table->string('nome');
            $table->date('dataNascimento');
            $table->string('CPF');            
            $table->string('email');
            $table->string('password');
            $table->string('equipe');
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
