@props(['navContent' => []])

@php
    $home = $navContent['home'];
    $addJob = $navContent['add_job'];
    $jobs = $navContent['jobs'];
    $savedJobs = $navContent['saved_jobs'];
    $dashboard = $navContent['dashboard'];
    $signIn = $navContent['sign_in'];
    $signUp = $navContent['sign_up'];

    function isActive($route)
    {
        return request()->is($route) ? 'active' : '';
    }
@endphp

<nav class="hidden md:flex items-center space-x-4">
    <x-button-link url="{{ $addJob['url'] }}" icon="plus">{{ $addJob['title'] }}</x-button-link>
    <x-nav-link url="{{ $home['url'] }}" active="{{ isActive('/') }}">{{ $home['title'] }}</x-nav-link>
    <x-nav-link url="{{ $jobs['url'] }}" active="{{ isActive('jobs') }}">{{ $jobs['title'] }}</x-nav-link>
    <x-nav-link url="{{ $savedJobs['url'] }}"
        active="{{ isActive('saved-jobs') }}">{{ $savedJobs['title'] }}</x-nav-link>
    <x-nav-link url="{{ $dashboard['url'] }}" active="{{ isActive('dashboard') }}"
        icon="pie-chart">{{ $dashboard['title'] }}</x-nav-link>
    <x-nav-link url="{{ $signIn['url'] }}" active="{{ isActive('sign-in') }}"
        icon="log-in">{{ $signIn['title'] }}</x-nav-link>
    <x-nav-link url="{{ $signUp['url'] }}" active="{{ isActive('sign-up') }}">{{ $signUp['title'] }}</x-nav-link>
</nav>
