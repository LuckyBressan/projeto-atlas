@extends('layouts.default')

@section('title', $title)

@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('clientes.create') }}">Incluir Cliente</a>

    @if ($message = session('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif

    @if ($message = session('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    @foreach ($clientes as $cliente)

        <div>
            {{ $cliente->id }} - {{ $cliente->nome }}
            - <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
            - <a href="{{ route('clientes.delete', $cliente->id) }}">Excluir</a>
        </div>

    @endforeach
@endsection
