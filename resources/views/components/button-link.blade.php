@props([
    'url' => '/',
    'icon' => null,
    'bgClass' => 'bg-indigo-700',
    'hoverClass' => 'bg-indigo-800',
    'textClass' => 'text-white',
])

<a href={{ url($url) }}
    class="{{ $bgClass }} hover:{{ $hoverClass }} {{ $textClass }} px-4 pr-5 py-2 rounded hover:shadow-md transition duration-300 flex">
    @if ($icon)
        <i class="mr-2" data-feather="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
