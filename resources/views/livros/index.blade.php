@extends('layouts.default')

@section('title', $title)

@section('content')
    <x-card title="Lista de {{ $title }}" description="Dados dos livros cadastrados na biblioteca">
        <div class="flex flex-col gap-3">
            <div>
                <a href="{{ route('livros.create') }}" class="btn">
                    <x-lucide-plus-circle></x-lucide-plus-circle>
                    Incluir
                </a>
            </div>

            @if ($livros->isEmpty())
                <x-empty-state title="Nada encontrado">
                    <x-slot name="icon">
                        <x-lucide-book-open-text/>
                    </x-slot>
                    <x-slot name="description">
                        Você não cadastrou nenhum livro ainda.<br>
                        Comece criando algum.
                    </x-slot>
                </x-empty-state>
            @else
                <x-table>
                    <x-slot name="header">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Autor</th>
                            <th>Categoria</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </x-slot>

                    @foreach ($livros as $livro)
                        <tr>
                            <td>{{ $livro->id }}</td>
                            <td>{{ $livro->titulo }}</td>
                            <td>{{ $livro->autor }}</td>
                            <td>{{ $livro->categoria->titulo }}</td>
                            <td>
                                @if ($livro->status === App\Enums\LivroStatus::DISPONIVEL->value)
                                    Disponivel
                                @else
                                    Emprestado
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('livros.edit', $livro->id) }}" class="btn-outline btn-edit" data-tooltip="Editar">
                                    <x-lucide-edit/>
                                </a>
                                <button
                                    type="button"
                                    onclick="modal.confirmarExclusao('{{ route('livros.delete', $livro->id) }}', 'alert-delete')"
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
        title="Excluir Livro"
        description="Tem certeza de que deseja excluir este livro? Esta ação não poderá ser desfeita."
        on-confirm="modal.executarExclusao()"
        on-cancel="modal.cancelarExclusao('alert-delete')"
    />

    <x-alert-area />

@endsection
