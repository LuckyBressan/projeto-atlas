@if ($message = session('error'))
    <script defer>
        //timeout necessário para que o js do toast carregue corretamente e permita disparar o aviso
        setTimeout(() => {
            document.dispatchEvent(new CustomEvent('basecoat:toast', {
                detail: {
                    config: {
                        category: 'error',
                        title: 'Algo deu errado!',
                        description: '{{ $message }}',
                    }
                }
            }))
        }, 250);
    </script>
@endif

@if ($message = session('success'))
    <script defer>
        //timeout necessário para que o js do toast carregue corretamente e permita disparar o aviso
        setTimeout(() => {
            document.dispatchEvent(new CustomEvent('basecoat:toast', {
                detail: {
                    config: {
                        category: 'success',
                        title: 'Sucesso!',
                        description: '{{ $message }}',
                    }
                }
            }))
        }, 250);
    </script>
@endif
