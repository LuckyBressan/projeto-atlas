<?php

namespace App\Models;

use App\Enums\LivroStatus;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'status',
        'categoria_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function processos()
    {
        return $this->hasMany(Processo::class);
    }
}
