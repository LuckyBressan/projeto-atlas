@extends('layouts.default')

@section('title', $title)

@section('content')


    <div class="grid gap-2">
        <a href="{{ route('clientes.index') }}" class="btn-outline w-max">
            <x-lucide-arrow-big-left-dash/>
            Voltar
        </a>
        <x-card title="Lista de {{ $title }}" description="Dados dos processos do cliente">
            <div class="flex flex-col gap-3">
                <div>
                    <a href="{{ route('processos.create', $cliente->id) }}" class="btn">
                        <x-lucide-plus-circle></x-lucide-plus-circle>
                        Incluir
                    </a>
                </div>
                @if ($processos->isEmpty())
                    <!-- Empty state para quando não há nenhum cliente cadastrado -->
                    <x-empty-state title="Nada encontrado">
                        <x-slot name="icon">
                            <x-lucide-book-search/>
                        </x-slot>
                        <x-slot name="description">
                            Você não cadastrou nenhum processo para o cliente ainda.<br>
                            Comece criando algum.
                        </x-slot>
                    </x-empty-state>
                @else
                    <x-table>
                        <x-slot name="header">
                            <tr>
                                <th>ID</th>
                                <th>Livro</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </x-slot>
                        @foreach ($processos as $proc)

                            <tr>
                                <td>
                                    {{ $proc->id }}
                                </td>
                                <td>
                                    {{ $proc->livro?->titulo ?? 'Livro não informado' }}
                                </td>
                                <td>
                                    @if ($proc->status == App\Enums\ProcessoStatus::ABERTO->value)
                                        Retirado
                                    @else
                                        Devolvido
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('processos.edit', [$cliente->id, $proc->id]) }}" class="btn-outline btn-edit"
                                        data-tooltip="Editar">
                                        <x-lucide-edit/>
                                    </a>
                                    <!-- Sei que tá dando erro de sintaxe, ignore, pois está funcionando -->
                                    <button
                                        type="button"
                                        onclick="modal.confirmarExclusao('{{ route('processos.delete', [$cliente->id, $proc->id]) }}', 'alert-delete')"
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
    </div>


    <x-dialog
        id="alert-delete"
        title="Excluir Processo"
        description="Tem certeza de que deseja excluir este processo? Esta ação não poderá ser desfeita."
        on-confirm="modal.executarExclusao()"
        on-cancel="modal.cancelarExclusao('alert-delete')"
    />

    @if (isset($message))
        <x-alert-area message="{{ $message }}"></x-alert-area>
    @endif

@endsection
