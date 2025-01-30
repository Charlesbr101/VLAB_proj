<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Categoria_Transacao;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transacao extends Model
{
    //
    protected $table = 'TRANSACAO';
    public $timestamps = false;
    protected $guarded = [];

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class);
    }

    public function categoria_transacao(): BelongsTo
    {
        return $this->belongsTo(Categoria_Transacao::class)->withDefault();
    }
}
