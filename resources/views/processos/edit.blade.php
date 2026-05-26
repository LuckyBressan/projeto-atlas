@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>{{ $title }}</h1>

    <a href="{{ route('processos.index', $cliente->id) }}">Home</a>

    <br>
    <br>

    @if ($errors->any)
        @foreach ($errors->all() as $err)
            <div style="color: red;">
                {{ $err }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('processos.update', $processo->id) }}" method="post">
        @csrf
        @method('PATCH')
        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
        <div>
            <label for="livro_id">Livro</label>
            <select name="livro_id" id="livro_id">
                <option value="">Selecione um livro</option>
                @foreach ($livros as $livro)
                    <option value="{{ $livro->id }}" @selected($processo->livro_id == $livro->id)>
                        {{ $livro->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="observacao">Observação</label>
            <textarea name="observacao" id="observacao">{{ $processo->observacao }}</textarea>
        </div>
        <div>
            <label for="data_retirada">Data de Retirada</label>
            <input type="date" name="data_retirada" id="data_retirada" value="{{ $processo->data_retirada }}">
        </div>
        <div>
            <label for="data_prevista">Data Prevista</label>
            <input type="date" name="data_prevista" id="data_prevista" value="{{ $processo->data_prevista }}">
        </div>
        <div>
            <label for="data_devolucao">Data Devolução</label>
            <input type="date" name="data_devolucao" id="data_devolucao" value="{{ $processo->data_devolucao }}">
        </div>
        <div>
            <label for="status">Status</label>
            <input
                type="radio"
                name="status"
                value="{{ App\Enums\ProcessoStatus::ABERTO }}"
                @checked($processo->status == App\Enums\ProcessoStatus::ABERTO->value)
            >Aberto
            <input
                type="radio"
                name="status"
                value="{{ App\Enums\ProcessoStatus::FECHADO }}"
                @checked($processo->status == App\Enums\ProcessoStatus::FECHADO->value)
            >Fechado
        </div>
        <input type="submit" value="Enviar">
    </form>
@endsection
