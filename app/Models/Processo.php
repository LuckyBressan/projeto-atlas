<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Processo extends Model
{
    use HasFactory;
    protected $fillable = [
        'observacao',
        'status',
        'data_retirada',
        'data_prevista',
        'data_devolucao',
        'livro_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
