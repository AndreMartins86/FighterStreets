<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaixasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('faixas')->insert([
            'faixa' => 'Marrom'
        ]);

        DB::table('faixas')->insert([
            'faixa' => 'Preta'
        ]);

        
    }
}
