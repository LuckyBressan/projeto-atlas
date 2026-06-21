@extends('layouts.default')

@section('title', $title)

@section('content')
    <div class="grid gap-2">
        <a href="{{ route('categorias.index') }}" class="btn-outline w-max">
            <x-lucide-arrow-big-left-dash/>
            Voltar
        </a>

        <x-card title="{{ $title }}" description="Informe os dados para inclusão da categoria">
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

                <x-form action="{{ route('categorias.store') }}" method="post">
                    @csrf

                    <x-input
                        id="titulo"
                        title="Título"
                        placeholder="Ex: Literatura Brasileira"
                        value="{{ old('titulo') }}"
                        required
                    />

                    <x-textarea
                        id="descricao"
                        title="Descrição"
                        placeholder="Ex: Categoria para livros de autores nacionais"
                    >{{ old('descricao') }}</x-textarea>
                </x-form>
            </div>
        </x-card>
    </div>

@endsection
