<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use LDAP\Result;
use Illuminate\Database\Eloquent\Builder;

class Resultado extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function campeonato(): BelongsTo
    {
        return $this->belongsTo(Campeonato::class);        
    }

    protected static function finalizar($id, $sexo, $peso, $faixa)
    {
        //dd("break");        
        $resultadosQuery = Chave::where('campeonato_id', $id)
        ->where('sexo_id', $sexo)
        ->where('peso_id', $peso)
        ->where('faixa_id', $faixa)
        ->orderBy('numeroLuta', 'desc')
        ->limit(2)
        ->get();

        //campeonato_id	sexo_id	faixa_id ṕeso_id primeiroColocado segundoColocado terceiroColocado created_at updated_at

        $resultado =  Resultado::updateOrCreate(
            ['campeonato_id' => $id,
            'sexo_id' => $sexo,
            'faixa_id' => $faixa,
            'peso_id' => $peso],
            ['primeiroColocado' => $resultadosQuery[1]->vencedor,
            'segundoColocado' => $resultadosQuery[1]->vencedor == $resultadosQuery[1]->lutador_1 ? $resultadosQuery[1]->lutador_2 : $resultadosQuery[1]->lutador_1,
            'terceiroColocado' => $resultadosQuery[0]->vencedor]
        );

        if (Resultado::where('campeonato_id', $id)->count() > 7) {
            $camp = Campeonato::find($id);
            $camp->fase_id = 3;
            $camp->save();
        }       
    }

    protected static function listarNomesAtletas($id)
    {
        return Resultado::fromQuery(
            "SELECT res.campeonato_id, res.sexo_id, res.faixa_id, res.peso_id, p.nome AS 'primeiroColocado',
            s.nome AS 'segundoColocado', t.nome AS 'terceiroColocado', p.equipe AS 'equipePrimeiroColocado',
            s.equipe AS 'equipeSegundoColocado', t.equipe AS 'equipeTerceiroColocado' FROM `resultados` AS res
            LEFT JOIN `atletas` AS p ON res.primeiroColocado = p.id
            LEFT JOIN `atletas` AS s ON res.segundoColocado = s.id
            LEFT JOIN `atletas` AS t ON res.terceiroColocado = t.id 
            WHERE campeonato_id = ?
            ORDER BY res.faixa_id, res.peso_id, res.sexo_id;",
            [$id]
        );
    }

    protected static function posicaoAtleta($campeonato, $atleta): string | bool
    {
        $res = Resultado::where('campeonato_id', $campeonato->id)
        ->where(function (Builder $query) use ($atleta) {
            $query->orWhere('primeiroColocado', $atleta->id)
            ->orWhere('segundoColocado', $atleta->id)
            ->orWhere('terceiroColocado', $atleta->id);
          })->get();

          
          if ($res->count() > 0) {
            if (array_keys($res[0]->getAttributes(), $atleta->id)[0] == 'primeiroColocado') {
                return '1º Lugar';
            } elseif (array_keys($res[0]->getAttributes(), $atleta->id)[0] == 'segundoColocado') {
                return '2º Lugar';
            } else {
                return '3º Lugar';
            }            
          }

          return false;
        
    }



}
