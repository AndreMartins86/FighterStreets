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
        return DB::table('fases')->where('id', $this->fase_id)->value('fase');
    }

    public function getEstado()
    {
        return DB::table('estados')->where('id', $this->estado_id)->value('sigla');
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

            return $dataCampeonato->format(strtotime($this->data));
    }

    public function getTipo()
    {
        return DB::table('tipos')->where('id', $this->tipo_id)->value('tipo');
    }

    public function getLocal()
    {
        $cidade = $this->cidade;

        $estado = $this->getEstado();

        return $cidade . ' - ' . $estado;
        
    }

    public function getSexo()
    {
        return DB::table('sexos')->where('id', $this->sexo_id)->value('sexo');
    }

    public function friendUrl()
    {
        return str_replace(' ', '-', $this->titulo);
    }


}
