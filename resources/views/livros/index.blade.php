@extends('layouts.default')

@section('title', $title)

@section('content')

    <h1>Lista de {{ $title }}</h1>

    <a href="{{ route('livros.create') }}">Incluir Livro</a>

    @foreach ($livros as $livro)

        <div>
            {{ $livro->id }} - {{ $livro->titulo }} ({{ $livro->autor }})
            - Categoria: {{ $livro->categoria->titulo }}
            - Status: {{ $livro->status }}
            - <a href="{{ route('livros.edit', $livro->id) }}">Editar</a>
            - <a href="{{ route('livros.delete', $livro->id) }}">Excluir</a>
        </div>

    @endforeach

@endsection
