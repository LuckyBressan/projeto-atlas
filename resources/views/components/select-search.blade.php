@props([
    'id' => '',
    'title' => '',
    'classButton' => '',
    'default' => ['name' => '', 'title' => 'Selecione uma opção...'],
    'options' => []
])

<div class="grid gap-2">
    <label for="{{ $id }}">{{ $title }}</label>
    <div id="{{ $id }}" class="select">
        <button type="button" class="btn-outline w-[180px] {{ $classButton }}" id="{{ $id }}-trigger" aria-haspopup="listbox" aria-expanded="false" aria-controls="{{ $id }}-listbox">
            <span class="truncate">{{ $default['title'] }}</span>

            <x-lucide-chevron-down />
        </button>
        <div id="{{ $id }}-popover" data-popover aria-hidden="true">
            <header>
                <x-lucide-search />
                <input type="text" value="" placeholder="Pesquisar {{ $title }}..." autocomplete="off" autocorrect="off" spellcheck="false" aria-autocomplete="list" role="combobox" aria-expanded="false" aria-controls="{{ $id }}-listbox" aria-labelledby="{{ $id }}-trigger" />
            </header>

            <div role="listbox" id="{{ $id }}-listbox" aria-orientation="vertical" aria-labelledby="{{ $id }}-trigger">

                    @if (is_array($options))
                        @foreach ($options as $option)
                            @if (isset($option['group']) && is_array($option['group']))
                                <div role="group" aria-labelledby="group-label-{{ $id }}-items-{{ $option['name'] }}">
                                    <div role="heading" id="group-label-{{ $id }}-items-{{ $option['name'] }}">{{ $option['title'] }}</div>
                                    @foreach ($option['group'] as $subOption)
                                        <div
                                            id="{{ $id }}-items-{{ $option['name'] }}-{{ $subOption['name'] }}"
                                            role="option"
                                            data-value="{{ $subOption['name'] }}"
                                        >
                                            {{ $subOption['title'] }}
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div
                                    id="{{ $id }}-items-{{ $option['name'] }}"
                                    role="option"
                                    data-value="{{ $option['name'] }}"
                                >
                                    {{ $option['title'] }}
                                </div>
                            @endif
                        @endforeach
                    @endif
            </div>
        </div>
        <input type="hidden" name="{{ $id }}-value" value="{{ $default['name'] }}" />
    </div>
</div>
