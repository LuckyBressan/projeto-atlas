@props([
    'onConfirm' => 'document.getElementById("alert-dialog").close()',
    'onCancel' => 'document.getElementById("alert-dialog").close()',
    'id' => "alert-dialog",
    'title' => '',
    'description' => ''
])

<dialog
    id="{{ $id }}"
    aria-labelledby="{{ $id }}-title",
    aria-describedby="{{ $id }}-description"
    {{
        $attributes->merge([
            'class' => "dialog",
        ])
    }}
>
  <div>
    <header>
      <h2 id="alert-dialog-title">{{ $title }}</h2>
      <p id="alert-dialog-description">{{ $description }}</p>
    </header>

    <footer>
        <button class="btn-outline" onclick="{{ $onCancel }}">Cancelar</button>
        <button class="btn-primary" onclick="{{ $onConfirm }}">Confirmar</button>
    </footer>
  </div>
</dialog>
