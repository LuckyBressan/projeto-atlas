<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/basecoat-css@0.3.11/dist/basecoat.cdn.min.css">
    <script src="https://cdn.jsdelivr.net/npm/basecoat-css@0.3.11/dist/js/all.min.js" defer></script>
    <title>@yield('title', 'Clientes')</title>
</head>

<body>
    <x-sidebar></x-sidebar>
    <main>
        <header class="bg-white sticky inset-x-0 top-0 isolate flex shrink-0 items-center gap-2 border-b z-10">
            <div class="flex h-14 w-full items-center gap-2 px-4">
                <button type="button" onclick="document.dispatchEvent(new CustomEvent('basecoat:sidebar'))" class="btn-sm-icon-ghost mr-auto size-7 -ml-1.5" data-tooltip="Toggle menu" data-side="bottom" data-align="start">
                    <x-lucide-sidebar class="w-4 h-4" />
                </button>
            </div>
        </header>
        <section class="flex justify-center align-center p-6">
            <div class="w-5xl">
                @yield('content')
            </div>
        </section>
    </main>
</body>

</html>
