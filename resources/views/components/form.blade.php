<form class="form grid gap-6" action="{{ $action }}" method="{{ $method }}">
  {{ $slot }}

  <button type="submit" class="btn">Enviar</button>
</form>
