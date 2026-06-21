<aside class="sidebar" data-side="left" aria-hidden="false">
    <nav aria-label="Sidebar navigation">
        <section class="scrollbar">
            <span class="w-64 h-30 overflow-hidden flex justify-center items-center">
                <img src="../../logo-atlas.png" alt="logo biblioteca" class="w-max h-max">
            </span>
            <div role="group" aria-labelledby="group-label-content-1">
                <h3 id="group-label-content-1">Menus disponíveis</h3>

                <ul>
                    <li>
                        <a href="{{ route('clientes.index') }}">
                            <x-lucide-users></x-lucide-users>
                            <span>Clientes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('processos.search') }}">
                            <x-lucide-book-search></x-lucide-book-search>
                            <span>Processos</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('livros.index') }}">
                            <x-lucide-book-open-text></x-lucide-book-open-text>
                            <span>Livros</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('categorias.index') }}">
                            <x-lucide-square-stack></x-lucide-square-stack>
                            <span>Categorias</span>
                        </a>
                    </li>
                </ul>
            </div>
        </section>
    </nav>
</aside>
