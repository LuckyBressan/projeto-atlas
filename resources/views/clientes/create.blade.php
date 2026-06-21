@extends('layouts.default')

@section('title', $title)

@section('content')

    <div class="grid gap-2">
        <a href="{{ route('clientes.index') }}" class="btn-outline w-max">
            <x-lucide-arrow-big-left-dash/>
            Voltar
        </a>
        <x-card title="{{ $title }}" description="Informe os dados para inclusão do cliente">

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

                <x-form action="{{ route('clientes.store') }}" method="post">
                    @csrf
                    <x-input
                        id="nome"
                        title="Nome"
                        name="nome"
                        placeholder="ex: Romario da Silva"
                        required
                    />

                    <fieldset class="grid grid-cols-2 gap-3">
                        <x-input
                            id="cpf"
                            title="CPF"
                            name="cpf"
                            placeholder="XXX-XXX-XXX-XX"
                            required
                        />

                        <x-input
                            id="data_nascimento"
                            type="date"
                            title="Data de Nascimento"
                            name="data_nascimento"
                        />
                    </fieldset>

                    <fieldset class="grid gap-3">
                        <label>
                            Sexo
                        </label>
                        <div class="flex gap-3">
                            @foreach ([App\Enums\SexoCliente::MASCULINO, App\Enums\SexoCliente::FEMININO] as $sexo)
                                <x-radio
                                    class="cursor-pointer"
                                    name="sexo"
                                    id="sexo"
                                    value="{{ $sexo->value }}"
                                    checked="{{ $sexo->value == App\Enums\SexoCliente::MASCULINO->value }}"
                                    label="{{ $sexo->name }}"
                                />
                            @endforeach
                        </div>
                    </fieldset>
                </x-form>
            </div>
        </x-card>
    </div>

@endsection
