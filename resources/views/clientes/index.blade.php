@extends('layouts.default')

@section('title', $title)

@section('content')

    <x-card title="Lista de {{ $title }}" description="Dados dos clientes da biblioteca">
        <div class="flex flex-col gap-3">
            <div>
                <a href="{{ route('clientes.create') }}" class="btn">
                    <x-lucide-plus-circle></x-lucide-plus-circle>
                    Incluir
                </a>
            </div>
            @if ($clientes->isEmpty())
                <!-- Empty state para quando não há nenhum cliente cadastrado -->
                <x-empty-state title="Nada encontrado">
                    <x-slot name="icon">
                        <x-lucide-user-round-x/>
                    </x-slot>
                    <x-slot name="description">
                        Você não cadastrou nenhum cliente ainda.<br>
                        Comece criando algum.
                    </x-slot>
                </x-empty-state>
            @else
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>CPF</th>
                            <th>Data de Nascimento</th>
                            <th></th>
                        </tr>
                    </x-slot>
                    @foreach ($clientes as $cliente)

                        <tr>
                            <td>
                                {{ $cliente->id }}
                            </td>
                            <td>
                                {{ $cliente->nome }}
                            </td>
                            <td>
                                {{ $cliente->cpf_formatted }}
                            </td>
                            <td>
                                {{ $cliente->data_nascimento_formatted ?? '-' }}
                            </td>
                            <td>
                                <a href="{{ route('processos.index', $cliente->id) }}" class="btn-outline"
                                    data-tooltip="Ver processos">
                                    <x-lucide-book-search/>
                                </a>
                                <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn-outline btn-edit"
                                    data-tooltip="Editar">
                                    <x-lucide-edit/>
                                </a>
                                <!-- Sei que tá dando erro de sintaxe, ignore, pois está funcionando -->
                                <button
                                    type="button"
                                    onclick="clientes.confirmarExclusao('{{ route('clientes.delete', $cliente->id) }}', 'alert-delete')"
                                    class="btn-outline btn-delete aspect-square"
                                    data-tooltip="Excluir"
                                >
                                    <x-lucide-trash-2/>
                                </button>
                            </td>
                        </tr>

                    @endforeach
                </x-table>
            @endif
        </div>


    </x-card>

    <x-dialog
        id="alert-delete"
        title="Excluir Cliente"
        description="Tem certeza de que deseja excluir este cliente? Esta ação não poderá ser desfeita."
        on-confirm="clientes.executarExclusao()"
        on-cancel="clientes.cancelarExclusao('alert-delete')"
    />

    @if (isset($message))
        <x-alert-area message="{{ $message }}"></x-alert-area>
    @endif

@endsection
