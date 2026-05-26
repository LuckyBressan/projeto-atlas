<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Processo extends Model
{
    protected $fillable = [
        'observacao',
        'status',
        'data_retirada',
        'data_prevista',
        'data_devolucao',
        'livro_id',
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function livro() {
        return $this->belongsTo(Livro::class);
    }
}
