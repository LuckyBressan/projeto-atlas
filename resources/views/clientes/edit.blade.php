@extends('layouts.default')

@section('title', $title)



@section('content')

    <x-card title="{{ $title }}" description="Informe os dados para inclusão do cliente">
        <a href="{{ route('clientes.index') }}">Home</a>

        <br>
        <br>

        @if ($errors->any)
            @foreach ($errors->all() as $err)
                <div style="color: red;">
                    {{ $err }}
                </div>
            @endforeach
        @endif

        <x-form action="{{ route('clientes.store') }}" method="post">
            @csrf
            <x-input
                id="nome"
                type="text"
                title="Nome"
                name="nome"
                placeholder="ex: Romario da Silva"
            />

            <fieldset class="grid grid-cols-2 gap-3">
                <x-input
                    id="cpf"
                    type="text"
                    title="CPF"
                    name="cpf"
                    placeholder="XXX-XXX-XXX-XX"
                />

                <x-input
                    id="data_nascimento"
                    type="date"
                    title="Data de Nascimento"
                    name="data_nascimento"
                    placeholder="XXX-XXX-XXX-XX"
                />
            </fieldset>

            <fieldset class="grid gap-3">
                <label>
                    Sexo
                </label>
                @foreach ([App\Enums\SexoCliente::MASCULINO, App\Enums\SexoCliente::FEMININO] as $sexo)
                    <x-radio
                        name="sexo"
                        id="sexo"
                        value="{{ $sexo->value }}"
                        checked="{{ $sexo->value == App\Enums\SexoCliente::MASCULINO->value }}"
                        label="{{ $sexo->name }}"
                    />
                @endforeach
            </fieldset>
        </x-form>
    </x-card>

    <h1>{{ $title }}</h1>

    <a href="{{ route('clientes.index') }}">Home</a>

    @if ($errors->any)
        <br>
        <br>
        @foreach ($errors->all() as $err)
            <div style="color: red;">
                {{ $err }}
            </div>
        @endforeach
        <br>
        <br>
    @endif

    <form action="{{ route('clientes.update', $cliente->id) }}" method="post">
        @csrf
        @method('PATCH')
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}">
        </div>
        <div>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" value="{{ $cliente->cpf }}">
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" value="{{ $cliente->data_nascimento }}">
        </div>
        <div>
            <label for="sexo">Sexo</label>
            <input
                type="radio"
                name="sexo"
                id="sexo"
                value="{{ App\Enums\SexoCliente::MASCULINO }}"
                @checked($cliente->sexo == App\Enums\SexoCliente::MASCULINO->value)
            >Masculino
            <input
                type="radio"
                name="sexo"
                id="sexo"
                value="{{ App\Enums\SexoCliente::FEMININO }}"
                @checked($cliente->sexo == App\Enums\SexoCliente::FEMININO->value)
            >Feminino
        </div>
        <input type="submit" value="Enviar">
    </form>
@endsection
