<label {{ $attributes->merge(['class' => 'label']) }}>
    <input type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" class="input" @checked($checked)>{{ $label }}
</label>
