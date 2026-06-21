@extends('layouts.default')

@section('title', $title)

@section('content')
    <div class="grid gap-2">
        <a href="{{ route('processos.index', $cliente->id) }}" class="btn-outline w-max">
            <x-lucide-arrow-big-left-dash />
            Voltar
        </a>

        <x-card title="{{ $title }}" description="Altere os dados do processo">
            <div class="grid gap-6">
                @if (!$errors->isEmpty())
                    <fieldset class="grid gap-2">
                        @foreach ($errors->all() as $err)
                            <x-alert title="Ops! Algo deu errado" type="destructive">
                                <x-slot name="icon">
                                    <x-lucide-circle-alert />
                                </x-slot>
                                {{ $err }}
                            </x-alert>
                        @endforeach
                    </fieldset>
                @endif

                <x-form action="{{ route('processos.update', $processo->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <input name="cliente_id" type="hidden" value="{{ $cliente->id }}" class="hidden">

                    <x-select-search
                        id="livro"
                        title="Livro"
                        :options="$livros"
                        :default="['name' => $processo->livro_id, 'title' => '' ]"
                    />

                    <x-textarea
                        id="observacao"
                        title="Observação"
                        placeholder="Ex: livro devolvido/retirado com defeito"
                        value="{{ $processo->observacao }}"
                    />

                    <fieldset class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        <x-input type="date" id="data_retirada" title="Data de Retirada" value="{{ $processo->data_retirada }}" />
                        <x-input type="date" id="data_prevista" title="Data Prevista" value="{{ $processo->data_prevista }}" />
                        <x-input type="date" id="data_devolucao" title="Data Devolução" value="{{ $processo->data_devolucao }}" />
                    </fieldset>

                    <fieldset class="grid gap-3">
                        <label>
                            Status
                        </label>
                        <div class="flex gap-3">
                            @foreach ([App\Enums\ProcessoStatus::ABERTO, App\Enums\ProcessoStatus::FECHADO] as $status)
                                <x-radio
                                    name="status"
                                    id="status_{{ $status->value }}"
                                    value="{{ $status->value }}"
                                    checked="{{ $processo->status === $status->value }}"
                                    label="{{ $status->name }}"
                                />
                            @endforeach
                        </div>
                    </fieldset>
                </x-form>
            </div>
        </x-card>
    </div>
@endsection
