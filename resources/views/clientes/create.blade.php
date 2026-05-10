@extends('layouts.default')

@section('title', $title)



@section('content')

    <h1>{{ $title }}</h1>

    <a href="{{ route('clientes.index') }}">Home</a>

    <br>
    <br>

    @if ($errors->any)
        @foreach ($errors->all() as $err)
            <div>
                {{ $err }}
            </div>
        @endforeach
    @endif

    <form action="{{ route('clientes.store') }}" method="post">
        @csrf
        <div>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf">
        </div>
        <div>
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento">
        </div>
        <div>
            <label for="sexo">Sexo</label>
            <input type="radio" name="sexo" id="sexo" value="{{ App\Enums\SexoCliente::MASCULINO }}" checked>Masculino
            <input type="radio" name="sexo" id="sexo" value="{{ App\Enums\SexoCliente::FEMININO }}">Feminino
        </div>
        <input type="submit" value="Enviar">
    </form>
@endsection
