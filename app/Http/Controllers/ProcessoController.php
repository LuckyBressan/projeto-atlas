<?php

namespace App\Http\Controllers;

use App\Enums\ProcessoStatus;
use App\Models\Cliente;
use App\Models\Processo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProcessoController extends Controller
{
    public function index(Cliente $cliente)
    {
        $processos = $cliente->processos;

        return view('processos.index', [
            'processos' => $processos,
            'cliente' => $cliente,
            'title' => 'Processos do Cliente: ' . $cliente->nome
        ]);
    }

    public function create(Cliente $cliente)
    {
        return view('processos.create', [
            'cliente' => $cliente,
            'title' => 'Incluir Processo'
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validate($request);

        $cliente = Cliente::findOrFail($dados['cliente_id']);

        $cliente->processos()->create($dados);

        return redirect()->route('processos.index', $cliente->id);
    }

    public function edit(Cliente $cliente, Processo $processo)
    {
        return view('processos.edit', [
            'processo' => $processo,
            'cliente' => $cliente,
            'title' => 'Processo - Cliente: ' . $cliente->nome
        ]);
    }


    public function update(Processo $processo, Request $request)
    {
        $dados = $this->validate($request);

        if (Cliente::findOrFail($dados['cliente_id'])) {
            $processo->update($dados);
        }

        return redirect()->route('processos.index', $dados['cliente_id']);
    }

    public function destroy(Cliente $cliente, Processo $processo)
    {
        $processo->delete();
        return redirect()->route('processos.index', $cliente);
    }

    private function validate(Request $request)
    {
        $hasDevolucao = $request->filled('data_devolucao');

        $statusRule = $hasDevolucao
            ? ['required', Rule::in([ProcessoStatus::FECHADO->value])]
            : ['required', Rule::in([ProcessoStatus::ABERTO->value])];

        $rules = [
            'observacao' => ['string', 'nullable'],
            'status' => $statusRule,
            'data_retirada' => [
                Rule::date()->format('Y-m-d'),
                'required'
            ],
            'data_prevista' => [
                Rule::date()->format('Y-m-d'),
                'required',
                'after:data_retirada'
            ],
            'data_devolucao' => [
                Rule::date()->format('Y-m-d'),
                'after_or_equal:data_retirada',
                Rule::date()->beforeOrEqual(today()),
                'nullable'
            ],
            'cliente_id' => ['required', 'exists:App\\Models\\Cliente,id']
        ];

        return $request->validate($rules);
    }
}
