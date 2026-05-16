@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('processos.create', $cliente->id) }}">Incluir Processo</a>

    @foreach ($processos as $proc)

        <div>

            Processo -
            @if ($proc->status == App\Enums\ProcessoStatus::ABERTO->value)
                Retirado
            @else
                Devolvido
            @endif
            - <a href="{{ route('processos.edit', [$cliente->id, $proc->id]) }}">Editar</a>
            - <a href="{{ route('processos.destroy', [$cliente->id, $proc->id]) }}">Excluir</a>
        </div>

    @endforeach
@endsection
