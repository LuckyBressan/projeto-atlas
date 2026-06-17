@props(['type' => 'default', 'title' => ''])

<div
    class="{{
        [
            'destructive' => 'alert-destructive',
            'default' => 'alert'
        ][$type]
    }}"
>
    @if(isset($icon))
        {{ $icon }}
    @endif
    <h2>{{ $title }}</h2>
    <section>
        {{ $slot }}
    </section>
</div>
