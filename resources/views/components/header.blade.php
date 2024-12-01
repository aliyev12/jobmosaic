<header class="bg-slate-900 text-white p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href={{ url('/') }}>
                <span class="text-white ">Job</span>
                <span class="text-indigo-300 ">Mosaic</span>
                <span class="text-indigo-300">
                    <i class="fa fa-circle"></i>
                </span>
            </a>
        </h1>
        <x-nav-links :navContent="$navContent" />
        <button id="hamburger" class="text-white md:hidden flex items-center">
            <i class="fa fa-bars text-2xl"></i>
        </button>
    </div>

    {{-- <nav id="mobile-menu" class="md:hidden  text-white mt-5 pb-4 space-y-2">
        <a href={{ url($addJob['url']) }}
            class=" bg-indigo-700 hover:bg-indigo-800 text-white px-4 py-2 rounded hover:shadow-md transition duration-300">
            <i class="fa fa-edit"></i> {{ $addJob['title'] }}
        </a>
        <a href={{ url($jobs['url']) }} class="nav-link-mobile">{{ $jobs['title'] }}</a>
        <a href={{ url($savedJobs['url']) }} class="nav-link-mobile">{{ $savedJobs['title'] }}</a>
        <a href={{ url($dashboard['url']) }} class="nav-link-mobile">{{ $dashboard['title'] }}</a>
        <a href={{ url($signIn['url']) }} class="nav-link-mobile">{{ $signIn['title'] }}</a>
        <a href={{ url($signUp['url']) }} class="nav-link-mobile">{{ $signUp['title'] }}</a>
    </nav> --}}
</header>
