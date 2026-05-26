<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;


//Listar
Route::get('livros', [LivroController::class, 'index'])->name('livros.index');

//Incluir
Route::get('livros/incluir', [LivroController::class, 'create'])->name('livros.create');
Route::post('livros/incluir', [LivroController::class, 'store'])->name('livros.store');

//Atualizar
Route::get('livros/editar/{livro}', [LivroController::class, 'edit'])->name('livros.edit');
Route::patch('livros/editar/{livro}', [LivroController::class, 'update'])->name('livros.update');

//Deletar
Route::get('livros/excluir/{livro}', [LivroController::class, 'delete'])->name('livros.delete');
