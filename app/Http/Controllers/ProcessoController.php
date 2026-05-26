<?php

namespace App\Http\Controllers;

use App\Enums\LivroStatus;
use App\Enums\ProcessoStatus;
use App\Models\Cliente;
use App\Models\Livro;
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
        $livros = Livro::where('status', LivroStatus::DISPONIVEL)->get();

        return view('processos.create', [
            'cliente' => $cliente,
            'livros' => $livros,
            'title' => 'Incluir Processo'
        ]);
    }

    public function store(Request $request)
    {
        $dados = $this->validate($request);

        $cliente = Cliente::findOrFail($dados['cliente_id']);

        $cliente->processos()->create($dados);

        Livro::findOrFail($dados['livro_id'])->update(['status' => LivroStatus::EMPRESTADO]);

        return redirect()->route('processos.index', $cliente->id);
    }

    public function edit(Cliente $cliente, Processo $processo)
    {
        $livros = Livro::where('status', LivroStatus::DISPONIVEL)
            ->orWhere('id', $processo->livro_id)
            ->get();

        return view('processos.edit', [
            'processo' => $processo,
            'cliente' => $cliente,
            'livros' => $livros,
            'title' => 'Processo - Cliente: ' . $cliente->nome
        ]);
    }


    public function update(Processo $processo, Request $request)
    {
        $dados = $this->validate($request);

        if (Cliente::findOrFail($dados['cliente_id'])) {
            if ($processo->livro_id !== (int) $dados['livro_id']) {
                Livro::findOrFail($processo->livro_id)->update(['status' => LivroStatus::DISPONIVEL]);
                Livro::findOrFail($dados['livro_id'])->update(['status' => LivroStatus::EMPRESTADO]);
            }

            $processo->update($dados);

            if ($processo->status === ProcessoStatus::FECHADO->value) {
                Livro::findOrFail($dados['livro_id'])->update(['status' => LivroStatus::DISPONIVEL]);
            }
        }

        return redirect()->route('processos.index', $dados['cliente_id']);
    }

    public function destroy(Cliente $cliente, Processo $processo)
    {
        if ($processo->livro_id && $processo->status === ProcessoStatus::ABERTO->value) {
            Livro::findOrFail($processo->livro_id)->update(['status' => LivroStatus::DISPONIVEL]);
        }

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
            'cliente_id' => ['required', 'exists:App\\Models\\Cliente,id'],
            'livro_id' => ['required', 'exists:App\\Models\\Livro,id'],
        ];

        return $request->validate($rules);
    }
}
