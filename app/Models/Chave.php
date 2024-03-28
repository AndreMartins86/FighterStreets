<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chave extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function campeonato(): BelongsTo
    {
        return $this->belongsTo(Campeonato::class);
        
    }
}
