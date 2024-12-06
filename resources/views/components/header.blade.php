<header class="bg-slate-900 text-white p-4" x-data="{ open: false }">
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
        <button id="hamburger" class="text-white md:hidden flex items-center" @click="() => { open = !open; }">
            <i data-feather="menu"></i>
        </button>
    </div>
    <x-nav-links :navContent="$navContent" :mobile="true" />
</header>
