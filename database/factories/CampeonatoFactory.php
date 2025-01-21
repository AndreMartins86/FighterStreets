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
            'Campeonato Regional Santista 2025',
            'Torneio Estadual Infantil 2025',
            'Jiu-Jitsu Masters 2025',
            'Liga Jiu-Jitsu de Pindamonhangaba',
            'Torneio de Jiu-Jitsu Praia Grande 2025',
            'Torneio Federação Paulista de Jiu-Jitsu 2025',            
            'MMA Masters 2025',
            'Rio vs São Paulo MMA III',
            'Death Cage 2025',
            'Mortal Kombat II',
            'Maia Championship Nacional 2025',
            'Torneio Federação Carioca de Jiu-Jitsu 2025',
            'Fists of Fury',
            'Torneio Federação Mineira de Jiu-Jitsu',
            'Street Fighter 2025'
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
            'Rio de Janeiro',
            'Belo Horizonte'
        ];

//id titulo imagem cidade estado_id data sobre informacoes ginasio tipo_id fase_id status

        return [
            'titulo' => $titulos[rand(0, 14)],
            'imagem' => $imagem[rand(0, 3)],
            'cidade' => $cidades[rand(0 , 5)],
            'estado_id' => rand(1, 27),
            'data' => fake()->dateTimeBetween('now', '+6 months'),
            'sobre' => fake()->text(),
            'informacoes' => fake()->text(),
            'ginasio' => ucwords(fake()->word()),
            'tipo_id' => rand(1, 2),
            'fase_id' => rand(1, 3),
            'status' => 1           
        ];
    }
}
