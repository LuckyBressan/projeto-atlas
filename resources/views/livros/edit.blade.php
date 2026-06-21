@extends('layouts.default')

@section('title', $title)

@section('content')
    <div class="grid gap-2">
        <a href="{{ route('livros.index') }}" class="btn-outline w-max">
            <x-lucide-arrow-big-left-dash/>
            Voltar
        </a>

        <x-card title="{{ $title }}" description="Altere os dados do livro cadastrado">
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

                <x-form action="{{ route('livros.update', $livro->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <x-input
                        id="titulo"
                        title="Título"
                        placeholder="Ex: Dom Casmurro"
                        value="{{ old('titulo', $livro->titulo) }}"
                        required
                    />

                    <x-input
                        id="autor"
                        title="Autor"
                        placeholder="Ex: Machado de Assis"
                        value="{{ old('autor', $livro->autor) }}"
                        required
                    />

                    <x-textarea
                        id="descricao"
                        title="Descrição"
                        placeholder="Ex: Romance clássico da literatura brasileira"
                    >{{ old('descricao', $livro->descricao) }}</x-textarea>

                    <fieldset class="grid gap-2">
                        <label for="categoria_id">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="select" required>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" @selected(old('categoria_id', $livro->categoria_id) == $categoria->id)>
                                    {{ $categoria->titulo }}
                                </option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="grid gap-3">
                        <label>Status</label>
                        <div class="flex gap-3">
                            @foreach ([App\Enums\LivroStatus::DISPONIVEL, App\Enums\LivroStatus::EMPRESTADO] as $status)
                                <x-radio
                                    name="status"
                                    id="status_{{ $status->value }}"
                                    value="{{ $status->value }}"
                                    checked="{{ old('status', $livro->status) === $status->value }}"
                                    label="{{ ucfirst(strtolower($status->name)) }}"
                                />
                            @endforeach
                        </div>
                    </fieldset>
                </x-form>
            </div>
        </x-card>
    </div>

@endsection
