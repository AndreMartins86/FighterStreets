<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Atleta;
use App\Models\Campeonato;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;

class Chave extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function campeonato(): BelongsTo
    {
        return $this->belongsTo(Campeonato::class);
        
    }

    protected static function chaveInicial($id)
    {
      $campeonato = Campeonato::find($id);

      /// Feminino  ///////

      $femMarromLeve = $campeonato->atletas()
      ->where('sexo_id', 1)
      ->where('faixa_id', 1)
      ->where('peso_id', 1)      
      //->selectRaw('campeonatos.titulo, atletas.nome, atletas.equipe')
      ->get();

      $femMarromPesado = $campeonato->atletas()
      ->where('sexo_id', 1)
      ->where('faixa_id', 1)
      ->where('peso_id', 2)      
      ->get();

      $femPretaLeve = $campeonato->atletas()
      ->where('sexo_id', 1)
      ->where('faixa_id', 2)
      ->where('peso_id', 1)      
      ->get();

      $femPretaPesado = $campeonato->atletas()
      ->where('sexo_id', 1)
      ->where('faixa_id', 2)
      ->where('peso_id', 2)      
      ->get();


      //// Masculino ////


      $masMarromLeve = $campeonato->atletas()
      ->where('sexo_id', 2)
      ->where('faixa_id', 1)
      ->where('peso_id', 1)      
      ->get();

      $masMarromPesado = $campeonato->atletas()
      ->where('sexo_id', 2)
      ->where('faixa_id', 1)
      ->where('peso_id', 2)      
      ->get();

      $masPretaLeve = $campeonato->atletas()
      ->where('sexo_id', 2)
      ->where('faixa_id', 2)
      ->where('peso_id', 1)      
      ->get();

      $masPretaPesado = $campeonato->atletas()
      ->where('sexo_id', 2)
      ->where('faixa_id', 2)
      ->where('peso_id', 2)      
      ->get();

      self::formarChaves($femMarromLeve, $campeonato);
      self::formarChaves($femMarromPesado, $campeonato);
      self::formarChaves($femPretaLeve, $campeonato);
      self::formarChaves($femPretaPesado, $campeonato);

      self::formarChaves($masMarromLeve, $campeonato);
      self::formarChaves($masMarromPesado, $campeonato);
      self::formarChaves($masPretaLeve, $campeonato);
      self::formarChaves($masPretaPesado, $campeonato);

      $campeonato->fase_id = 2;
      $campeonato->save();
        
    }

    private static function formarChaves(Collection $atlet, Campeonato $camp)
    {

      $atletas = $atlet->toArray();
      
      $p1 = $p2 = $rep = 0;
      $numLuta = 1;      

      do {

        $tam = count($atletas);
        $p2++;

        if ($p2 >= $tam) {
          $p2 = $tam - 1;
        }

        if ($atletas[$p1]['equipe'] != $atletas[$p2]['equipe']) {          
      
          self::salvarLuta($atletas, $camp, $numLuta, $p1, $p2);
  
            $numLuta++;  
            unset($atletas[$p1]);
            unset($atletas[$p2]);
  
            $atletas = array_values($atletas);
            $p2 = 0;
            continue;
            
          }

        if ($atletas[$p1]['equipe'] == $atletas[$p2]['equipe'] && $rep < $tam) {
          $rep++;                    
          continue;
        }

        if ($rep >= $tam) {
          self::salvarLuta($atletas, $camp, $numLuta, $p1, $p2);
          
          $numLuta++;
          unset($atletas[$p1]);
          unset($atletas[$p2]); 

          $atletas = array_values($atletas);
          $p2 = 0;          
        }       

      } while ($atletas != null);
      
    }

    private static function salvarLuta(Array $atletas,Campeonato $camp, int $numLuta, int $p1, int $p2)
    {
      $chave = new Chave();

      $chave->campeonato_id = $camp->id;
      $chave->numeroLuta = $numLuta;
      $chave->lutador_1 = $atletas[$p1]['id'];
      $chave->lutador_2 = $atletas[$p2]['id'];
      $chave->sexo_id = $atletas[$p1]['sexo_id'];
      $chave->faixa_id = $atletas[$p1]['faixa_id'];
      $chave->peso_id = $atletas[$p1]['peso_id'];

      $chave->save();
      
    }

    public static function buscarChavesDetalhes($id, $sexo, $peso, $faixa): Collection
    {
        $IDs = self::getIDs($sexo, $peso, $faixa);

        return Chave::where('campeonato_id', $id)
        ->where('sexo_id', $IDs[0] )
        ->where('peso_id', $IDs[1])
        ->where('faixa_id', $IDs[2])
        ->orderBy('numeroLuta')
        ->get();        

    }

    public function getFaixa()
    {
        return DB::table('faixas')->where('id', $this->faixa_id)->value('faixa');
    }

    public function getPeso()
    {
        return DB::table('pesos')->where('id', $this->peso_id)->value('peso');
    }

    public function getSexo()
    {
        return DB::table('sexos')->where('id', $this->sexo_id)->value('sexo');
    }    

    private static function getIDs($sexo, $peso, $faixa): Array
    {
        $s = DB::table('sexos')->where('sexo', $sexo)->value('id');
        $p = DB::table('pesos')->where('peso', $peso)->value('id');
        $f = DB::table('faixas')->where('faixa', $faixa)->value('id');
        $vetor = [$s, $p, $f];

        return $vetor;
    }


}
