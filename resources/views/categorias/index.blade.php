@extends('layouts.default')

@section('title', $title)

@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('categorias.create') }}">Incluir Categoria</a>

    @if ($message = session('error'))
        <div class="alert alert-danger">{{ $message }}</div>
    @endif

    @if ($message = session('success'))
        <div class="alert alert-success">{{ $message }}</div>
    @endif

    @foreach ($categorias as $categoria)

        <div>
            {{ $categoria->id }} - {{ $categoria->titulo }}
            - <a href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>
            - <a href="{{ route('categorias.delete', $categoria->id) }}">Excluir</a>
        </div>

    @endforeach

@endsection
