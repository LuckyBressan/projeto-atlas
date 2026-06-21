@extends('layouts.default')

@section('title', $title)

@section('content')
    <x-card title="Lista de {{ $title }}" description="Dados das categorias de livros da biblioteca">
        <div class="flex flex-col gap-3">
            <div>
                <a href="{{ route('categorias.create') }}" class="btn">
                    <x-lucide-plus-circle></x-lucide-plus-circle>
                    Incluir
                </a>
            </div>

            @if ($categorias->isEmpty())
                <x-empty-state title="Nada encontrado">
                    <x-slot name="icon">
                        <x-lucide-square-stack/>
                    </x-slot>
                    <x-slot name="description">
                        Você não cadastrou nenhuma categoria ainda.<br>
                        Comece criando alguma.
                    </x-slot>
                </x-empty-state>
            @else
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descrição</th>
                            <th></th>
                        </tr>
                    </x-slot>

                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->titulo }}</td>
                            <td>{{ $categoria->descricao ?: '-' }}</td>
                            <td>
                                <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn-outline btn-edit" data-tooltip="Editar">
                                    <x-lucide-edit/>
                                </a>
                                <button
                                    type="button"
                                    onclick="modal.confirmarExclusao('{{ route('categorias.delete', $categoria->id) }}', 'alert-delete')"
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
        title="Excluir Categoria"
        description="Tem certeza de que deseja excluir esta categoria? Esta ação não poderá ser desfeita."
        on-confirm="modal.executarExclusao()"
        on-cancel="modal.cancelarExclusao('alert-delete')"
    />

    <x-alert-area />

@endsection
