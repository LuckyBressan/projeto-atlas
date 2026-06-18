<div class="overflow-x-auto">
    <table class="table">
        @if(isset($caption))
            <caption>{{ $caption }}</caption>
        @endif
        @if(isset($header))
            <thead>
                {{ $header }}
            </thead>
        @endif
        <tbody>
            {{ $slot }}
        </tbody>
        @if(isset($footer))
            <tfoot>
                {{ $footer }}
            </tfoot>
        @endif
    </table>
</div>
