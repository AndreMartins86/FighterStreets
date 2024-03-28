<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Hash;

class SexosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sexos')->insert([
            'sexo' => 'Feminino',
            'abbr' => 'F'
        ]);

        DB::table('sexos')->insert([
            'sexo' => 'Masculino',
            'abbr' => 'M'
        ]);
    }
}
