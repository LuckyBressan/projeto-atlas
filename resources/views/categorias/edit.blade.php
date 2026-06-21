@extends('layouts.default')

@section('title', $title)

@section('content')
    <div class="grid gap-2">
        <a href="{{ route('categorias.index') }}" class="btn-outline w-max">
            <x-lucide-arrow-big-left-dash/>
            Voltar
        </a>

        <x-card title="{{ $title }}" description="Altere os dados da categoria cadastrada">
            <div class="grid gap-6">
                @if (!$errors->isEmpty())
                    <fieldset class="grid gap-3">
                        @foreach ($errors->all() as $err)
                            <x-alert title="Ops! Algo deu errado" type="destructive">
                                <x-slot name="icon">
                                    <x-lucide-circle-alert/>
                                </x-slot>
                                {{ $err }}
                            </x-alert>
                        @endforeach
                    </fieldset>
                @endif

                <x-form action="{{ route('categorias.update', $categoria->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <x-input
                        id="titulo"
                        title="Título"
                        placeholder="Ex: Literatura Brasileira"
                        value="{{ old('titulo', $categoria->titulo) }}"
                        required
                    />

                    <x-textarea
                        id="descricao"
                        title="Descrição"
                        placeholder="Ex: Categoria para livros de autores nacionais"
                    >{{ old('descricao', $categoria->descricao) }}</x-textarea>
                </x-form>
            </div>
        </x-card>
    </div>

@endsection
