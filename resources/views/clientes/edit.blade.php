@extends('layouts.default')

@section('title', $title)



@section('content')

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
        <br>igrej
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
