<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FasesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fases')->insert([
            'fase' => 'Inscrições Abertas'
        ]);

        DB::table('fases')->insert([
            'fase' => 'Chaves'
        ]);

        DB::table('fases')->insert([
            'fase' => 'Resultados'
        ]);
    }
}
