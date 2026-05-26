<?php

namespace App\Http\Controllers;

use App\Enums\LivroStatus;
use App\Models\Categoria;
use App\Models\Livro;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('categoria')->get();

        return view('livros.index', [
            'livros' => $livros,
            'title' => 'Livros'
        ]);
    }

    public function create()
    {
        $categorias = Categoria::all();

        return view('livros.create', [
            'categorias' => $categorias,
            'title' => 'Incluir Livro'
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validateLivro($request);
        Livro::create($dados);
        return redirect()->route('livros.index');
    }

    public function edit(Livro $livro)
    {
        $categorias = Categoria::all();

        return view('livros.edit', [
            'livro' => $livro,
            'categorias' => $categorias,
            'title' => 'Alterar Livro - ' . $livro->titulo
        ]);
    }

    public function update(Livro $livro, Request $request)
    {
        $dados = $this->validateLivro($request);
        $livro->update($dados);
        return redirect()->route('livros.index');
    }

    public function delete(Livro $livro)
    {
        $livro->delete();
        return redirect()->route('livros.index');
    }

    private function validateLivro(Request $request)
    {
        return $request->validate([
            'titulo'       => ['required', 'string', 'min:2', 'max:100'],
            'descricao'    => ['nullable', 'string'],
            'autor'        => ['required', 'string', 'min:2', 'max:100'],
            'status'       => ['required', Rule::enum(LivroStatus::class)],
            'categoria_id' => ['required', 'exists:App\\Models\\Categoria,id'],
        ]);
    }
}
