<div id="demo-dropdown-menu" class="dropdown-menu">
    <button type="button" id="dropdown-menu-trigger" aria-haspopup="menu" aria-controls="dropdown-menu-menu"
        aria-expanded="false" class="btn-outline">
        @if (isset($trigger))
            {{ $trigger }}
        @endif
    </button>
    <div id="dropdown-menu-popover" data-popover aria-hidden="true" class="min-w-56">
        <div role="menu" id="dropdown-menu-menu" aria-labelledby="dropdown-menu-trigger">
            <div role="group" aria-labelledby="account-options">
                @if (isset($titleGroup))
                    <div role="heading" id="account-options">{{ $titleGroup }}</div>
                @endif
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
