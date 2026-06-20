<?php

use App\Http\Controllers\ProcessoController;
use Illuminate\Support\Facades\Route;


Route::get('processos/{cliente}', [ProcessoController::class, 'index'])->name('processos.index'); //Acessar a view de listagem

Route::get('processos/{cliente}/editar/{processo}', [ProcessoController::class, 'edit'])->name('processos.edit'); //Acessar a view de edição de informações
Route::patch('processos/editar/{processo}', [ProcessoController::class, 'update'])->name('processos.update'); //Fazer o update de informações

//Incluir
Route::get('processos/incluir/{cliente}', [ProcessoController::class, 'create'])->name('processos.create'); // Acessar a view
Route::post('processos/incluir', [ProcessoController::class, 'store'])->name('processos.store'); // Salva as informações

//Deletar
Route::get('processos/{cliente}/excluir/{processo}', [ProcessoController::class, 'delete'])->name('processos.delete'); //Deleta de fato

