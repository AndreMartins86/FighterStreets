<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Campeonato;

class CampeonatosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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
        ];

        $imagem = [
            'img/torneio-card.jpg',
            'img/torneio1.jpeg',
            'img/torneio2.jpg',
            'img/mk.jpeg'
        ];

        $j = count($titulos);
        $cidade = '';
        $tipo = '';
        $cont = 0;

            // titulo  imagem  cidade  estado_id   dataCampeonato  sobre   local   informacoes entradaPublico  genero_id   tipo_id fase_id ativo   created_at  updated_at

        for ($i=0; $i < $j ; $i++) { 
            //////////////////////////////////////////////////////////////////
            //// Inscriçoes Abertas
            /////////////////////////////////////////////////////////////////

            if ($i <= 8) {
                Campeonato::create([
                'titulo' => $titulos[$i],
                'imagem' => $imagem[$cont],
                'cidade' => $cidade,
                'estado_id' => rand(1, 25),
                'data' => fake()->dateTimeBetween('-2 years', 'now'),
                'sobre' => fake()->text(),
                'ginasio' => 'Ginásio Municipal',                             
                'tipo_id' => rand (1, 2),
                'fase_id' => 1,
                'status' => '1'
        ]);
                
            }

        //////////////////////////////////////////////////////////////////
        //// Chaves
        /////////////////////////////////////////////////////////////////

            if ($i > 8 && $i <= 11) {
                Campeonato::create([
                'titulo' => $titulos[$i],
                'imagem' => $imagem[$cont],
                'cidade' => $cidade,
                'estado_id' => rand(1, 25),
                'data' => fake()->dateTimeBetween('-2 years', 'now'),
                'sobre' => fake()->text(),
                'ginasio' => 'Ginásio Municipal',                             
                'tipo_id' => rand (1, 2),
                'fase_id' => 2,
                'ativo' => '1',
        ]);
                
            }

        //////////////////////////////////////////////////////////////////
        //// Resultados
        /////////////////////////////////////////////////////////////////

            if ($i > 11) {
                Campeonato::create([
                'titulo' => $titulos[$i],
                'imagem' => $imagem[$cont],
                'cidade' => $cidade,
                'estado_id' => '25',
                'dataCampeonato' => fake()->dateTimeBetween('-2 years', 'now'),
                'sobre' => fake()->text(),
                'local' => 'Ginásio Municipal',
                'informacoes' => fake()->text(),
                'entradaPublico' => fake()->text(),                
                'tipo_id' => rand (1, 2),
                'fase_id' => 3,
                'ativo' => '0',
        ]);


            }
            
             $tipo = ($i < 7) ? 'Kimono' : 'No-Gi';
             $cidade = ($i < 7) ? 'Praia Grande' : 'Santos';


             $cont++;
             if ($cont > 3) {
                 $cont = 0;
             }
            
        }
    }
}
