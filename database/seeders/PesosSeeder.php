<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pesos')->insert([
            'peso' => 'Leve',
        ]);

        DB::table('pesos')->insert([
            'peso' => 'Pesado',
        ]);
        
    }
}
