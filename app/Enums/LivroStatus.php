<?php

namespace App\Enums;

enum LivroStatus: string
{
    case DISPONIVEL = 'DISPONIVEL';
    case EMPRESTADO = 'EMPRESTADO';
}
