<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Atleta;
use App\Models\Campeonato;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UsersSeeder::class,
            SexosSeeder::class,
            EstadosSeeder::class,
            FaixasSeeder::class,
            FasesSeeder::class,
            PesosSeeder::class,            
            TiposSeeder::class
        ]);    

        User::factory()->count(2)->create();

        $campeonatos = Campeonato::factory()->count(15)->create();

        $atletas = Atleta::factory()->count(200)->create();

        foreach($campeonatos as $camps){
            ///////////Feminino//////////////////////////////////
            $atletasFemPretaLeve = $atletas->where('sexo_id', 1)
            ->where('faixa_id', 2)
            ->where('peso_id', 1)
            ->random(12);

            foreach($atletasFemPretaLeve as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            $atletasFemPretaPesado = $atletas->where('sexo_id', 1)
            ->where('faixa_id', 2)
            ->where('peso_id', 2)
            ->random(12);

            foreach($atletasFemPretaPesado as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            $atletasFemMarromLeve = $atletas->where('sexo_id', 1)
            ->where('faixa_id', 1)
            ->where('peso_id', 1)
            ->random(12);

            foreach($atletasFemMarromLeve as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            $atletasFemMarromPesado = $atletas->where('sexo_id', 1)
            ->where('faixa_id', 1)
            ->where('peso_id', 2)
            ->random(12);

            foreach($atletasFemMarromPesado as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            ////////////Masculino//////////////////////////////
            $atletasMasPretaLeve = $atletas->where('sexo_id', 2)
            ->where('faixa_id', 2)
            ->where('peso_id', 1)
            ->random(12);

            foreach($atletasMasPretaLeve as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            $atletasMasPretaPesado = $atletas->where('sexo_id', 2)
            ->where('faixa_id', 2)
            ->where('peso_id', 2)
            ->random(12);

            foreach($atletasMasPretaPesado as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            $atletasMasMarromLeve = $atletas->where('sexo_id', 2)
            ->where('faixa_id', 1)
            ->where('peso_id', 1)
            ->random(12);

            foreach($atletasMasMarromLeve as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

            $atletasMasMarromPesado = $atletas->where('sexo_id', 2)
            ->where('faixa_id', 1)
            ->where('peso_id', 2)
            ->random(12);

            foreach($atletasMasMarromPesado as $salvandoAtletas){
                $camps->atletas()->attach($salvandoAtletas->id,
                 ['dataDaInscricao' => fake()->dateTimeBetween('-6 months', 'now')]);
            }

        }

    }
}
