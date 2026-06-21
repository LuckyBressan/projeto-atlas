<?php

namespace Database\Factories;

use App\Models\Processo;
use App\Models\Cliente;
use App\Models\Livro;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Processo>
 */
class ProcessoFactory extends Factory
{
    protected $model = Processo::class;

    public function definition(): array
    {
        $retirada = fake()->dateTimeBetween('-1 month', 'now');
        $data_retirada = $retirada->format('Y-m-d');
        $data_prevista = (clone $retirada)->modify('+7 days')->format('Y-m-d');

        $devolvido = fake()->boolean(60);
        $data_devolucao = $devolvido ? (clone $retirada)->modify('+10 days')->format('Y-m-d') : null;

        return [
            'observacao' => fake()->sentence(),
            'status' => fake()->randomElement(['ABERTO', 'FECHADO']),
            'data_retirada' => $data_retirada,
            'data_prevista' => $data_prevista,
            'data_devolucao' => $data_devolucao,
            'cliente_id' => Cliente::factory(),
            'livro_id' => Livro::factory(),
        ];
    }
}
