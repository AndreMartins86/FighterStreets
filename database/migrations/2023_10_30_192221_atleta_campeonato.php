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
        Schema::create('atleta_campeonato', function (Blueprint $table){     
            $table->foreignId('atleta_id')->constrained();
            $table->foreignId('campeonato_id')->constrained();
            $table->timestamp('dataDaInscricao');
            
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
