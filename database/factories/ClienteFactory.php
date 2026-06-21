<?php

namespace Database\Factories;

use App\Models\Cliente;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Cliente>
 */
class ClienteFactory extends Factory
{
    protected $model = Cliente::class;

    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'cpf' => fake()->numerify('###########'),
            'data_nascimento' => fake()->date(),
            'sexo' => fake()->randomElement(['M', 'F']),
        ];
    }
}
