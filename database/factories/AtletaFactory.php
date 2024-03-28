<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Validation\Rules\Unique;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Atleta>
 */
class AtletaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $equipes = [
            'Cobra Kai',
            'Mugiwara',
            'Discipulos Mestre Kame',
            'Projeto Caos',
            'Academia Senhor Myiagi',
            'Ikari Team',
            'Portuguesa'
        ];
//id nome dataNascimento CPF email senha equipe sexo_id	faixa_id peso_id        

        return [
            'nome' => fake()->name(),
            'dataNascimento' => fake()->dateTimeBetween('-45 years', '-18 years'),
            'CPF' => rand(11111111111, 99999999999),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make(1234),
            'equipe' => $equipes[rand(0, 6)],
            'sexo_id' => rand(1, 2),            
            'faixa_id' => rand(1, 2),
            'peso_id' => rand(1, 2)
        ];
    }
}
