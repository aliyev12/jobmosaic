@props(['url' => '/', 'active' => false, 'icon' => null])

<a href="{{ url($url) }}"" class="nav-link {{ $active }}">
    @if ($icon)
        <i data-feather="{{ $icon }}" class="mr-1"></i>
    @endif
    {{ $slot }}
</a>
