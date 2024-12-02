@props([
    'url' => '/',
    'icon' => null,
    'bgClass' => 'bg-indigo-700',
    'hoverClass' => 'bg-indigo-800',
    'textClass' => 'text-white',
    'mobile' => null,
    'variant' => null,
])

@php
    $variantClasses = $variant ? $variant : " $bgClass hover:$hoverClass $textClass ";
@endphp

<a href={{ url($url) }} class="button {{ $variantClasses }} {{ $mobile ? 'w-fit' : '' }}">
    @if ($icon)
        <i class="mr-2" data-feather="{{ $icon }}"></i>
    @endif
    {{ $slot }}
</a>
