@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>{{ $title }}</h1>

    <a href="{{ route('processos.index', $cliente->id) }}">Home</a>

    <br>
    <br>

    @if ($errors->any)
        @foreach ($errors->all() as $err)
            <div>
                {{ $err }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('processos.store') }}" method="post">
        @csrf
        <input type="hidden" name="cliente_id" value="{{ $cliente->id }}">
        <div>
            <label for="observacao">Observação</label>
            <textarea name="observacao" id="observacao"></textarea>
        </div>
        <div>
            <label for="data_retirada">Data de Retirada</label>
            <input type="date" name="data_retirada" id="data_retirada" value="{{ Date::now()->toDateString() }}">
        </div>
        <div>
            <label for="data_prevista">Data Prevista</label>
            <input type="date" name="data_prevista" id="data_prevista">
        </div>
        <div>
            <label for="status">Status</label>
            <input type="radio" name="status" value="{{ App\Enums\ProcessoStatus::ABERTO }}" checked>Aberto
            <input type="radio" name="status" value="{{ App\Enums\ProcessoStatus::FECHADO }}" >Fechado
        </div>
        <input type="submit" value="Enviar">
    </form>
@endsection
