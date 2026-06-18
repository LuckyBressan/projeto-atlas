<div class="card">
    <header>
        @if(isset($title))
            <h2>{{ $title }}</h2>
        @endif
        @if(isset($description))
            <p>{{ $description }}</p>
        @endif
        <hr class="separator">
    </header>
    <section>
        {{ $slot }}
    </section>
    @if(isset($footer))
        <footer>
            {{ $footer }}
        </footer>
    @endif
</div>
