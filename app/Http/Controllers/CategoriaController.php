<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index', [
            'categorias' => $categorias,
            'title' => 'Categorias'
        ]);
    }

    public function create()
    {
        return view('categorias.create', [
            'title' => 'Incluir Categoria'
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validateCategoria($request);
        Categoria::create($dados);
        return redirect()->route('categorias.index');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', [
            'categoria' => $categoria,
            'title' => 'Alterar Categoria - ' . $categoria->titulo
        ]);
    }

    public function update(Categoria $categoria, Request $request)
    {
        $dados = $this->validateCategoria($request);
        $categoria->update($dados);
        return redirect()->route('categorias.index');
    }

    public function delete(Categoria $categoria)
    {
        if($categoria->livros()->count() > 0) {
            return redirect()->route('categorias.index')->with('error', 'Não é possível excluir a categoria, pois existem livros associados a ela.');
        }
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success', 'Categoria deletada com sucesso.');
    }

    private function validateCategoria(Request $request)
    {
        return $request->validate([
            'titulo' => ['required', 'string', 'min:2', 'max:100'],
            'descricao' => ['nullable', 'string'],
        ]);
    }
}
