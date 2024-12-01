@props(['url' => '/', 'route' => '/', 'active' => false, 'icon' => null, 'mobile' => null])

@if ($mobile)
    <a href="{{ url($url) }}" class="nav-link-mobile {{ request()->is($route) ? 'active' : '' }}">
        @if ($icon)
            <i data-feather="{{ $icon }}" class="mr-1"></i>
        @endif
        {{ $slot }}
    </a>
@else
    <a href="{{ url($url) }}" class="nav-link {{ $active }}">
        @if ($icon)
            <i data-feather="{{ $icon }}" class="mr-1"></i>
        @endif
        {{ $slot }}
    </a>
@endif
