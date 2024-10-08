<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;


class Atleta extends Authenticatable //Para a autenticação em outra tabela
{
    use HasFactory;

    protected $guarded = [];

    protected $hidden = ['password'];

    public function campeonatos(): BelongsToMany
    {
        return $this->belongsToMany(Campeonato::class);        
    }

    public function getFaixa()
    {
        return DB::table('faixas')->where('id', $this->faixa_id)->value('faixa');
    }

    public function getPeso()
    {
        return DB::table('pesos')->where('id', $this->peso_id)->value('peso');
    }
    
}
