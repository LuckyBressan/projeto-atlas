<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'cpf',
        'data_nascimento',
        'sexo'
    ];

    public function processos()
    {
        return $this->hasMany(Processo::class);
    }

    /**
     * Retorna o CPF formatado (000.000.000-00).
     */
    public function getCpfFormattedAttribute()
    {
        $cpf = preg_replace('/\D/', '', $this->cpf ?? '');

        if (strlen($cpf) !== 11) {
            return $this->cpf;
        }

        return substr($cpf, 0, 3) . '.' . substr($cpf, 3, 3) . '.' . substr($cpf, 6, 3) . '-' . substr($cpf, 9, 2);
    }

    /**
     * Retorna a data de nascimento formatada (dd/mm/YYYY).
     */
    public function getDataNascimentoFormattedAttribute()
    {
        if (empty($this->data_nascimento)) {
            return null;
        }

        try {
            return Carbon::parse($this->data_nascimento)->format('d/m/Y');
        } catch (\Exception $e) {
            return $this->data_nascimento;
        }
    }
}
