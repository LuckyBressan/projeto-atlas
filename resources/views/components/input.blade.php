@props([
    'id' => '',
    'title' => '',
])

<div class="grid gap-2">
    <label for="{{ $id }}">{{ $title }}</label>
    <input
        {{ $attributes->merge([ 'type' => 'text', 'name' => $id ]) }}
    >
    {{ $slot }}
</div>
