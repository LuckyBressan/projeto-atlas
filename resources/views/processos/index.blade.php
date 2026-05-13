@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('processos.create', $cliente->id) }}">Incluir Processo</a>

    @foreach ($processos as $proc)

        <div>

            Processo -
            @if ($proc->data_devolucao == null && $proc->status == App\Enums\ProcessoStatus::ABERTO)
                Retirada
            @else
                Devolução
            @endif
            - <a href="{{ route('processos.destroy', $proc->id) }}">Excluir</a>
        </div>

    @endforeach
@endsection
