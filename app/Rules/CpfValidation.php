<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfValidation implements Rule
{
    public function passes($attribute, $value)
    {
        // Remove máscara
        $cpf = preg_replace('/[^\d]/', '', $value);

        // Verifica se tem 11 dígitos
        if (strlen($cpf) != 11) {
            return false;
        }

        // Verifica se não é sequência de dígitos iguais
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        // Calcula dígitos verificadores
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }

        return true;
    }

    public function message()
    {
        return 'O CPF informado não é válido.';
    }
}