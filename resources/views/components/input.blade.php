<div class="grid gap-2">
    <label for="{{ $id }}">{{ $title }}</label>
    <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" placeholder="{{ isset($placeholder) ? $placeholder : ''  }}">
    {{ $slot }}
</div>
