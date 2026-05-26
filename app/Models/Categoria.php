<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class);
    }
}
