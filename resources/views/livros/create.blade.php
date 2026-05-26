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

    <form action="{{ route('livros.store') }}" method="post">
        @csrf
        <div>
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') }}">
        </div>
        <div>
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" value="{{ old('autor') }}">
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao">{{ old('descricao') }}</textarea>
        </div>
        <div>
            <label for="status">Status</label>
            <select name="status" id="status">
                @foreach (App\Enums\LivroStatus::cases() as $status)
                    <option value="{{ $status->value }}" @selected(old('status') == $status->value)>
                        {{ $status->value }}
                    </option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="categoria_id">Categoria</label>
            <select name="categoria_id" id="categoria_id">
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                        {{ $categoria->titulo }}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Salvar">
    </form>

@endsection
