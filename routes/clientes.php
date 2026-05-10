<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Route;


//Listar
Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index'); //Acessar a view de listagem

//Incluir
Route::get('clientes/incluir', [ClienteController::class, 'create'])->name('clientes.create'); // Acessar a view
Route::post('clientes/incluir', [ClienteController::class, 'store'])->name('clientes.store'); // Salva as informações

//Atualizar
Route::get('clientes/editar/{cliente}', [ClienteController::class, 'edit'])->name('clientes.edit'); //Acessar a view de edição
Route::patch('clientes/editar/{cliente}', [ClienteController::class, 'update'])->name('clientes.update'); //Editar o registro de cliente

//Deletar
Route::get('clientes/excluir/{cliente}', [ClienteController::class, 'delete'])->name('clientes.delete'); //Deleta de fato

