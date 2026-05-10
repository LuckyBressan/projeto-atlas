@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('clientes.create') }}">Incluir Cliente</a>

    @foreach ($clientes as $cliente)

        <div>
            {{ $cliente->id }} - {{ $cliente->nome }}
            - <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
            - <a href="{{ route('clientes.delete', $cliente->id) }}">Excluir</a>
        </div>

    @endforeach
@endsection
