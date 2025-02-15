<header class="py-4 px-8" x-data="{ open: false }">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-3xl font-semibold">
            <a href={{ url('/') }}>
                <span>Job</span>
                <span class="text-slate-500 ">Mosaic</span>
                <span>
                    <i class="fa fa-circle"></i>
                </span>
            </a>
        </h1>
        <x-nav-links :navContent="$navContent" />
        <button id="hamburger" class="md:hidden flex items-center -m-[1px]" @click="() => { open = !open; }">
            <i data-feather="menu"></i>
        </button>
    </div>
    <x-nav-links :navContent="$navContent" :mobile="true" />
</header>
