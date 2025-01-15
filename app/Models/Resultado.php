<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        $resultadosQuery = Chave::where('campeonato_id', $id)
        ->where('sexo_id', $sexo)
        ->where('peso_id', $peso)
        ->where('faixa_id', $faixa)
        ->orderBy('numeroLuta', 'desc')
        ->limit(2)
        ->get();

        //dd($resultadosQuery[1]->vencedor);

        //campeonato_id	sexo_id	faixa_id ṕeso_id primeiroColocado segundoColocado terceiroColocado created_at updated_at

        $resultado = new Resultado([
            'campeonato_id' => $id,
            'sexo_id' => $sexo,
            'faixa_id' => $faixa,
            'peso_id' => $peso,
            'primeiroColocado' => $resultadosQuery[1]->vencedor,
            'segundoColocado' => $resultadosQuery[1]->vencedor == $resultadosQuery[1]->lutador_1 ? $resultadosQuery[1]->lutador_2 : $resultadosQuery[1]->lutador_1,
            'terceiroColocado' => $resultadosQuery[0]->vencedor,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $resultado->save();

        $camp = Campeonato::find($id);
        $camp->fase_id = 3;
        $camp->save();
    }



}
