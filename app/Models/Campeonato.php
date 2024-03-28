<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\DB;
use IntlDateFormatter;

class Campeonato extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function atletas(): BelongsToMany
    {
        return $this->belongsToMany(Atleta::class);        
    }

    public function chaves(): HasMany
    {
        return $this->hasMany(Chave::class);        
    }

    public function resultado(): HasOne
    {
        return $this->hasOne(Resultado::class);        
    }

    public function getFase()
    {
        $fase = DB::table('fases')->where('id', $this->fase_id)->value('fase');

        return $fase;
    }

    public function getEstado()
    {
        $estado = DB::table('estados')->where('id', $this->estado_id)->value('sigla');

        return $estado;
    }

    public function getData()
    {
        $dataCampeonato = new IntlDateFormatter(
    		'pt-BR',
    		IntlDateFormatter::FULL,
    		IntlDateFormatter::FULL,
    		'America/Sao_Paulo',
    		IntlDateFormatter::GREGORIAN,
    		'dd/MM/y'
			);

            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');

            $data = $dataCampeonato->format(strtotime($this->data));

            return $data;        
    }

    public function getTipo()
    {
        $tipo = DB::table('tipos')->where('id', $this->tipo_id)->value('tipo');

        return $tipo;        
    }

    public function getLocal()
    {
        $cidade = $this->cidade;

        $estado = $this->getEstado();

        return $cidade . '-' . $estado;
        
    }

    public function friendUrl()
    {
        return str_replace(' ', '-', $this->titulo);
    }


}
