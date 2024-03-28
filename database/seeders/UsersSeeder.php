<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\table;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //id name email email_verified_at password remember_token created_at updated_at

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make(1234),
            'role' => 'Admin',
            'created_at' => now()
            //'updated_at' => 'admin',
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'usuario@mail.com',
            'password' => Hash::make(1234),
            'role' => 'User',
            'created_at' => now(),
            //'updated_at' => 'admin',
        ]);


    }
}
