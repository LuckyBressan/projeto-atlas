<label {{ $attributes->merge(['class' => 'label cursor-pointer']) }}>
    <input type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" class="input" @checked($checked)>{{ $label }}
</label>
