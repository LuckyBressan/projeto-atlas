@extends('layouts.default')

@section('title', $title)

@section('content')


    <x-card title="{{ $title }}" description="Informe o cliente para realizar a busca de processos">
        <div class="flex flex-col gap-3">
            @if (count($clientes) == 0)
                <div class="grid gap-6">
                    <x-alert title="Nenhum cliente disponível" type="destructive">
                        <x-slot name="icon">
                            <x-lucide-circle-alert/>
                        </x-slot>
                        Cadastre um cliente antes de buscar um processo.
                    </x-alert>
                    <a href="{{ route('clientes.create') }}" class="btn w-max">
                        <x-lucide-user-round/>
                        Incluir cliente
                    </a>
                </div>
            @else
                <div class="grid gap-6">
                    <x-select-search
                        id="cliente"
                        title="Cliente"
                        classButton="w-full"
                        :options="$clientes"
                    />
                    <button class="btn" onclick="processos.redireciona('{{ route('processos.index', 0) }}')">
                        Buscar
                    </button>
                </div>
            @endif
        </div>


    </x-card>

    @if (isset($message))
        <x-alert-area message="{{ $message }}"></x-alert-area>
    @endif

@endsection
