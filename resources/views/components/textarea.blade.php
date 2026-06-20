@props([
    'id' => '',
    'title' => '',
])

<div class="grid gap-2">
    <label for="{{ $id }}" class="label">{{ $title }}</label>
    <textarea id="{{ $id }}" {{ $attributes->merge(['name' => $id]) }}></textarea>
    {{ $slot }}
</div>
