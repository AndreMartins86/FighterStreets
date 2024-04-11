<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campeonato>
 */
class CampeonatoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $titulos = [
            'Campeonato Regional Santista 2023',
            'Torneio Estadual Infantil 2024',
            'Jiu-Jitsu Masters 2023',
            'Liga Jiu-Jitsu de Pindamonhangaba',
            'Torneio de Jiu-Jitsu Praia Grande 2023',
            'Torneio Federação Paulista de Jiu-Jitsu 2023',            
            'MMA Masters 2023',
            'Rio vs São Paulo MMA III',
            'Death Cage 2023',
            'Mortal Kombat II',
            'Maia Championship Nacional 2023',
            'Torneio Federação Carioca de Jiu-Jitsu 2023',
            'Fists of Fury',
            'Torneio Federação Mineira de Jiu-Jitsu',
            'Street Fighter 2024'
        ];

        $imagem = [
            '/img/torneio-card.jpg',
            '/img/torneio1.jpeg',
            '/img/torneio2.jpg',
            '/img/mk.jpeg'
        ];

        $cidades = [
            'Praia Grande',
            'Santos',
            'São Vicente',
            'São Paulo',
            'Rio de Janeiro'
        ];

//id titulo imagem cidade estado_id data sobre informacoes ginasio tipo_id fase_id status

        return [
            'titulo' => $titulos[rand(0, 14)],
            'imagem' => $imagem[rand(0, 3)],
            'cidade' => $cidades[rand(0 , 4)],
            'estado_id' => rand(1, 27),
            'data' => fake()->dateTimeBetween('now', '+3 months'),
            'sobre' => fake()->text(),
            'informacoes' => fake()->text(),
            'ginasio' => ucwords(fake()->word()),
            'tipo_id' => rand(1, 2),
            'fase_id' => rand(1, 3),
            'status' => 1           
        ];
    }
}
