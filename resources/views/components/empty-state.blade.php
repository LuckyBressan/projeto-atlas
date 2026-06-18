 <div class="flex min-w-0 flex-1 flex-col items-center justify-center gap-6 rounded-lg border-dashed p-6 text-center text-balance md:p-12 text-neutral-800">
    <header class="flex max-w-sm flex-col items-center gap-2 text-center">
        <div class="mb-2 [&_svg]:pointer-events-none [&_svg]:shrink-0 bg-muted text-foreground flex size-10 shrink-0 items-center justify-center rounded-lg [&_svg:not([class*='size-'])]:size-6 bg-neutral-100">
            {{ $icon }}
        </div>
        <h3 class="text-lg font-medium tracking-tight">{{ $title }}</h3>
        <p class="text-muted-foreground [&>a:hover]:text-primary text-sm/relaxed [&>a]:underline [&>a]:underline-offset-4">
            {{ $description }}
        </p>
        {{ $slot }}
    </header>
</div>
