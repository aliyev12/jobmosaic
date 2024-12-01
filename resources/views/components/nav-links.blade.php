@props(['navContent' => [], 'mobile' => null])

@php
    $home = $navContent['home'];
    $addJob = $navContent['add_job'];
    $jobs = $navContent['jobs'];
    $savedJobs = $navContent['saved_jobs'];
    $dashboard = $navContent['dashboard'];
    $signIn = $navContent['sign_in'];
    $signUp = $navContent['sign_up'];
@endphp

@if ($mobile)
    <nav id="mobile-menu" class="md:hidden  text-white mt-5 pb-4 space-y-2">


        <x-nav-link url="{{ $home['url'] }}" route="/" :mobile="true">{{ $home['title'] }}</x-nav-link>
        <x-nav-link url="{{ $jobs['url'] }}" route="jobs" :mobile="true">{{ $jobs['title'] }}</x-nav-link>
        <x-nav-link url="{{ $savedJobs['url'] }}" route="saved-jobs"
            :mobile="true">{{ $savedJobs['title'] }}</x-nav-link>
        <x-nav-link url="{{ $dashboard['url'] }}" route="dashboard" :mobile="true"
            icon="pie-chart">{{ $dashboard['title'] }}</x-nav-link>
        <x-nav-link url="{{ $signIn['url'] }}" route="sign-in" :mobile="true"
            icon="log-in">{{ $signIn['title'] }}</x-nav-link>
        <x-nav-link url="{{ $signUp['url'] }}" route="sign-up" :mobile="true">{{ $signUp['title'] }}</x-nav-link>
        <x-button-link url="{{ $addJob['url'] }}" icon="plus"
            :mobile="true">{{ $addJob['title'] }}</x-button-link>
    </nav>
@else
    <nav class="hidden md:flex items-center space-x-4">
        <x-button-link url="{{ $addJob['url'] }}" icon="plus">{{ $addJob['title'] }}</x-button-link>
        <x-nav-link url="{{ $home['url'] }}" route="/">{{ $home['title'] }}</x-nav-link>
        <x-nav-link url="{{ $jobs['url'] }}" route="jobs">{{ $jobs['title'] }}</x-nav-link>
        <x-nav-link url="{{ $savedJobs['url'] }}" route="saved-jobs">{{ $savedJobs['title'] }}</x-nav-link>
        <x-nav-link url="{{ $dashboard['url'] }}" route="dashboard"
            icon="pie-chart">{{ $dashboard['title'] }}</x-nav-link>
        <x-nav-link url="{{ $signIn['url'] }}" route="sign-in" icon="log-in">{{ $signIn['title'] }}</x-nav-link>
        <x-nav-link url="{{ $signUp['url'] }}" route="sign-up">{{ $signUp['title'] }}</x-nav-link>
    </nav>
@endif
