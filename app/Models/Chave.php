<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Campeonato;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
    $totalAtletas = count($atletas);
    $sexoID = $atletas[0]['sexo_id'];
    $pesoID = $atletas[0]['peso_id'];
    $faixaID = $atletas[0]['faixa_id'];

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

    $qtdeDisputasInicial = ($totalAtletas / 2) + 1;
    //$totalDisputas = $totalAtletas;

    //campeonato_id	numeroLuta	lutador_1	lutador_2	vencedor	sexo_id	faixa_id	peso_id	created_at	updated_at	


    for ($i = $qtdeDisputasInicial; $i <= $totalAtletas; $i++) {

      $chave = Chave::create([
        'campeonato_id' => $camp->id,
        'numeroLuta' => $i,
        //'lutador_1' => null,
        //'lutador_2' => null,
        //'vencedor' => null,
        'sexo_id' => $sexoID,
        'faixa_id' => $faixaID,
        'peso_id' => $pesoID,
        'created_at' => now()
      ]);

      $chave->save();
    }
  }

  private static function salvarLuta(array $atletas, Campeonato $camp, int $numLuta, int $p1, int $p2)
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

  protected static function buscarChavesDetalhes($id, $sexo, $peso, $faixa): Collection
  {
    $IDs = self::getIDs($sexo, $peso, $faixa);

    return Chave::fromQuery(
      "SELECT C.numeroLuta, C.lutador_1, IFNULL(L1.nome, 'Aguardando...') AS 'nomeLutador1',
       IFNULL(L1.equipe, 'Aguardando...') AS 'equipeLutador1', C.lutador_2, IFNULL(L2.nome, 'Aguardando...') AS 'nomeLutador2',
       IFNULL(L2.equipe, 'Aguardando...') AS 'equipeLutador2', C.vencedor, C.sexo_id, C.peso_id, C.faixa_id FROM chaves C
       LEFT JOIN atletas L1 on C.lutador_1 = L1.id
       LEFT JOIN atletas L2 on C.lutador_2 = L2.id
       WHERE C.campeonato_id = ? AND C.sexo_id = ? AND C.peso_id = ? AND C.faixa_id = ?
       ORDER BY numeroLuta;",
      [$id, $IDs[0], $IDs[1], $IDs[2]]
    );
  }

  protected static function contadorChaves($camp, $sexo, $peso, $faixa): array
  {
    $IDs = self::getIDs($sexo, $peso, $faixa);

    $totalAtletas = $camp->atletas()
      ->where('sexo_id', $IDs[0])
      ->where('peso_id', $IDs[1])
      ->where('faixa_id', $IDs[2])
      ->count();

    $vet = [];
    $i = 0;

    do {

      $totalAtletas = $totalAtletas / 2;
      $vet[$i] = $totalAtletas;
      $i++;
    } while ($totalAtletas > 2);

    array_push($vet, 2);

    return $vet;
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

  private static function getIDs($sexo, $peso, $faixa): array
  {
    $s = DB::table('sexos')->where('sexo', $sexo)->value('id');
    $p = DB::table('pesos')->where('peso', $peso)->value('id');
    $f = DB::table('faixas')->where('faixa', $faixa)->value('id');
    
    return [$s, $p, $f];
  
  }

  protected function getValores($sexo, $peso, $faixa): array
  {
    $s = DB::table('sexos')->where('id', $sexo)->value('sexo');
    $p = DB::table('pesos')->where('id', $peso)->value('peso');
    $f = DB::table('faixas')->where('id', $faixa)->value('faixa');
    
    return [strtolower($s), strtolower($p), strtolower($f)];

  }

  protected function salvandoChaves(Request $req)
  {
    $reqVet = $req->all();
    $numLutasVet = [];

    // criar o vetor com número da luta e o vencedor
    foreach ($reqVet as $key => $value) {
      if (is_numeric($key)) {
        array_push($numLutasVet, [$key => $value]);
      }
    }

    $chaves = Chave::where('campeonato_id', $req->cID)
      ->where("sexo_id", $req->sID)
      ->where("faixa_id", $req->fID)
      ->where("peso_id", $req->pID)
      ->get();

    $chavesTam = count($chaves);
    $vetLutasTam = count($numLutasVet);

    //percorre as chaves e salva se o resultado estiver no vetor de lutas
    for ($j = 0; $j < $vetLutasTam; $j++) {
      for ($i = 0; $i < $chavesTam; $i++) {

        if ($chaves[$i]->numeroLuta == key($numLutasVet[$j])) {
          $chaves[$i]->vencedor = $numLutasVet[$j][key($numLutasVet[$j])];
          $chaves[$i]->save();
        }
      }
    }
  }

  protected function avancarChaves(Request $req)
  {
    $chaves = Chave::where('campeonato_id', $req->cID)
    ->where('sexo_id', $req->sID)
    ->where('peso_id', $req->pID)
    ->where('faixa_id', $req->fID)
    ->get();

    $qtdeDisputasInicial =  $chaves->count() / 2;
    $totalDisputas = $chaves->count();
    //dd($chaves);
    //$salvarPosicoes = [];
    $pos1 = 0;
    $pos2 = 1;

    for ($i=$qtdeDisputasInicial; $i < $totalDisputas ; $i++) {

      $chaves[$i]->lutador_1 = $chaves[$pos1]->vencedor;
      $chaves[$i]->lutador_2 = $chaves[$pos2]->vencedor;
      $chaves[$i]->save();
      $pos1 += 2;
      $pos2 = $pos1 + 1;

    }

    //dd($totalDisputas - 2);//14

    if ($chaves[($totalDisputas - 3)]->vencedor != NULL && $chaves[($totalDisputas - 4)]->vencedor != NULL) {
      if ($chaves[($totalDisputas - 4)]->lutador_1 == $chaves[($totalDisputas - 4)]->vencedor ) {
        $chaves[($totalDisputas - 1)]->lutador_1 = $chaves[($totalDisputas - 4)]->lutador_2;
        $chaves[($totalDisputas - 1)]->save();
      } else {
        $chaves[($totalDisputas - 1)]->lutador_1 = $chaves[($totalDisputas - 4)]->lutador_1;
        $chaves[($totalDisputas - 1)]->save();
      }

      if ($chaves[($totalDisputas - 3)]->lutador_1 == $chaves[($totalDisputas - 3)]->vencedor ) {
        $chaves[($totalDisputas - 1)]->lutador_2 = $chaves[($totalDisputas - 3)]->lutador_2;
        $chaves[($totalDisputas - 1)]->save();
      } else {
        $chaves[($totalDisputas - 1)]->lutador_2 = $chaves[($totalDisputas - 3)]->lutador_1;
        $chaves[($totalDisputas - 1)]->save();
      }
    }
  }

  protected static function btnEncerrar ($camp, $sexo, $peso, $faixa): bool
  {
    $IDs = self::getIDs($sexo, $peso, $faixa);

    $totalAtletas = $camp->atletas()
      ->where('sexo_id', $IDs[0])
      ->where('peso_id', $IDs[1])
      ->where('faixa_id', $IDs[2])
      ->count();

      $finais = [
        0 => Chave::where('sexo_id', $IDs[0])
        ->where('peso_id', $IDs[1])
        ->where('faixa_id', $IDs[2])
        ->where('campeonato_id', $camp->id)
        ->where('numeroLuta', $totalAtletas)        
        ->value('vencedor'),
        1 => Chave::where('sexo_id', $IDs[0])
        ->where('peso_id', $IDs[1])
        ->where('faixa_id', $IDs[2])
        ->where('campeonato_id', $camp->id)
        ->where('numeroLuta', $totalAtletas - 1)        
        ->value('vencedor')
      ];

      if ($finais[0] != NULL && $finais[1] != NULL) {
        return true;
      }      
      return false;
  }

}
