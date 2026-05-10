@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>{{ $text }}</h1>

    <a href="{{ route('clientes.index') }}">Home</a>

    <div>
        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" readonly>
    </div>
    <div>
        <label for="razao">Razão</label>
        <input type="text" name="razao" id="razao" value="{{ $cliente->razao }}" readonly>
    </div>
    <div>
        <label for="telefone">Telefone</label>
        <input type="tel" name="telefone" id="telefone" value="{{ $cliente->telefone }}" readonly>
    </div>
    <div>
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $cliente->email }}" readonly>
    </div>
    <div>
        <label for="status">Status:</label>
        {{ $cliente->status ? 'Ativo' : 'Inativo' }}
    </div>

    <form action="{{ route('clientes.destroy', $cliente->id) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Excluir">
    </form>
@endsection
