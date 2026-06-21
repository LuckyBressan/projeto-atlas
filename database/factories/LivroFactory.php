<?php

namespace Database\Factories;

use App\Models\Livro;
use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Livro>
 */
class LivroFactory extends Factory
{
    protected $model = Livro::class;

    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(3),
            'descricao' => fake()->paragraph(),
            'autor' => fake()->name(),
            'status' => fake()->randomElement(['DISPONIVEL', 'EMPRESTADO']),
            'categoria_id' => Categoria::factory(),
        ];
    }
}
