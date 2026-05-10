<?php

namespace App\Http\Controllers;

use App\Enums\SexoCliente;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', [
            'clientes' => $clientes,
            'title' => 'Clientes'
        ]);
    }

    public function create()
    {
        return view('clientes.create', [
            'title' => 'Incluir Cliente'
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validate($request);
        $dados['cpf'] = $this->removeCpfMask($dados['cpf']);
        Cliente::create($dados);
        return redirect()->route('clientes.index');
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', [
            'cliente' => $cliente,
            'title' => 'Alterar Cliente - ' . $cliente->nome
        ]);
    }

    public function update(Cliente $cliente, Request $request)
    {
        $dados = $this->validate($request);
        $dados['cpf'] = $this->removeCpfMask($dados['cpf']);
        $cliente->update($dados);
        return redirect()->route('clientes.index');
    }

    public function delete(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index');
    }

    private function validate(Request $request)
    {
        return $request->validate([
            'nome' => 'string|required|min:4|max:100',
            'cpf' => ['required', new \App\Rules\CpfValidation],
            'data_nascimento' => Rule::date()->format('Y-m-d'),
            'sexo' => [Rule::enum(SexoCliente::class)]
        ]);
    }

    private function removeCpfMask($cpf)
    {
        return preg_replace('/[^\d]/', '', $cpf);
    }
}
