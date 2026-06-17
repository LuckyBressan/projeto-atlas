<div class="grid w-full max-w-xl items-start gap-4">
    @if ($message = session('error'))
        <div class="alert-destructive">
            <x-lucide-circle-alert></x-lucide-circle-alert>
            <h2>Algo deu errado!</h2>
            <section>
                {{ $message }}
            </section>
        </div>
    @endif

    @if ($message = session('success'))
        <div class="alert">
            <x-lucide-circle-check></x-lucide-circle-check>
            <h2>Sucesso! Suas mudanças foram salvas.</h2>
            <section>
                {{ $message }}
            </section>
        </div>
    @endif
</div>
