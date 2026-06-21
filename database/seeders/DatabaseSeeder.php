<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Categoria;
use App\Models\Livro;
use App\Models\Processo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // Categorias e livros: prefira dados do JSON anexado a database/seeders/example.json
        $jsonPath = database_path('seeders/example.json');
        if (file_exists($jsonPath)) {
            $content = file_get_contents($jsonPath);
            $data = json_decode($content, true) ?? [];

            $createdCategories = [];
            if (!empty($data['categorias']) && is_array($data['categorias'])) {
                foreach ($data['categorias'] as $titulo) {
                    $createdCategories[] = Categoria::create([
                        'titulo' => $titulo,
                        'descricao' => null,
                    ]);
                }
            }

            if (!empty($data['livros']) && is_array($data['livros']) && count($createdCategories) > 0) {
                foreach ($data['livros'] as $index => $tituloLivro) {
                    $categoria = $createdCategories[$index % count($createdCategories)];
                    Livro::create([
                        'titulo' => $tituloLivro,
                        'descricao' => null,
                        'autor' => 'Autor Desconhecido',
                        'status' => 'DISPONIVEL',
                        'categoria_id' => $categoria->id,
                    ]);
                }
            }
        } else {
            // fallback: usa factories se o JSON não existir
            Categoria::factory()->count(3)->create()->each(function ($categoria) {
                Livro::factory()->count(3)->create(['categoria_id' => $categoria->id]);
            });
        }

        // Clientes
        Cliente::factory()->count(3)->create();

        // Processos (associa a clientes e livros já criados)
        // garante pelo menos 3 processos
        Processo::factory()->count(3)->create();
    }
}
