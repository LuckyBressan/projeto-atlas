@extends('layouts.default')

@section('title', $title)

@section('content')

    <h1>{{ $title }}</h1>

    <a href="{{ route('livros.index') }}">Voltar</a>

    <br>
    <br>

    @if ($errors->any())
        @foreach ($errors->all() as $err)
            <div style="color: red;">
                {{ $err }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('livros.update', $livro->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo', $livro->titulo) }}">
        </div>
        <div>
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" value="{{ old('autor', $livro->autor) }}">
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao">{{ old('descricao', $livro->descricao) }}</textarea>
        </div>
        <div>
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected(old('categoria_id', $livro->categoria_id) == $categoria->id)>
                        {{ $categoria->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Salvar">
    </form>

@endsection
