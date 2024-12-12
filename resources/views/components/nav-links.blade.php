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
  <nav x-show="open" @click.away="open = false" id="mobile-menu" class="md:hidden  text-white mt-5 pb-4 space-y-2">
    <x-nav-link url="{{ $home['url'] }}" route="/" :mobile="true">{{ $home['title'] }}</x-nav-link>
    <x-nav-link url="{{ $jobs['url'] }}" route="jobs" :mobile="true">{{ $jobs['title'] }}</x-nav-link>
    @auth
      <x-nav-link url="{{ $savedJobs['url'] }}" route="saved-jobs" :mobile="true">{{ $savedJobs['title'] }}</x-nav-link>
      <x-nav-link url="{{ $dashboard['url'] }}" route="dashboard" :mobile="true"
        icon="pie-chart">{{ $dashboard['title'] }}</x-nav-link>
      <x-logout-button />
      <x-button-link url="{{ $addJob['url'] }}" icon="plus" :mobile="true">{{ $addJob['title'] }}</x-button-link>
    @else
      <x-nav-link url="{{ $signIn['url'] }}" route="login" :mobile="true"
        icon="log-in">{{ $signIn['title'] }}</x-nav-link>
      <x-nav-link url="{{ $signUp['url'] }}" route="register" :mobile="true">{{ $signUp['title'] }}</x-nav-link>
    @endauth
  </nav>
@else
  <nav class="hidden md:flex items-center space-x-4">
    <x-nav-link url="{{ $home['url'] }}" route="/">{{ $home['title'] }}</x-nav-link>
    <x-nav-link url="{{ $jobs['url'] }}" route="jobs">{{ $jobs['title'] }}</x-nav-link>
    @auth
      <x-nav-link url="{{ $savedJobs['url'] }}" route="saved-jobs">{{ $savedJobs['title'] }}</x-nav-link>
      {{-- <x-nav-link url="{{ $dashboard['url'] }}" route="dashboard"
                icon="pie-chart">{{ $dashboard['title'] }}</x-nav-link> --}}
      <x-logout-button />
      <x-button-link url="{{ $addJob['url'] }}" icon="plus">{{ $addJob['title'] }}</x-button-link>
      <div class="flex-items-center space0x03">
        <a href="{{ route('dashboard') }}">
          @if (Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}"
              class="w-10 h-10 rounded-full">
          @else
            <img src="{{ asset('storage/avatars/default-avatar.png') }}" alt="{{ Auth::user()->name }}"
              class="w-10 h-10 rounded-full">
          @endif
        </a>
      </div>
    @else
      <x-nav-link url="{{ $signIn['url'] }}" route="login" icon="log-in">{{ $signIn['title'] }}</x-nav-link>
      <x-nav-link url="{{ $signUp['url'] }}" route="register">{{ $signUp['title'] }}</x-nav-link>
    @endauth
  </nav>
@endif
