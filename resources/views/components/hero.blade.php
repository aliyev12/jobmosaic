@props(['title' => 'Start Searching for Jobs'])

<section class="hero relative bg-cover bg-center bg-no-repeat h-80 flex items-center">
    <div class="overlay"></div>
    <div class="container mx-auto text-center z-10 flex items-center flex-col">
        <h2 class="text-4xl md:text-5xl text-white font-bold mb-8">{{ $title }}</h2>
        <form class="flex mx-5 space-y-2 md:space-y-0 md:mx-auto md:space-x-2 items-center">
            <input type="text" name="keywords" placeholder="What you're looking for?"
                class="w-full md:w-72 px-4 py-3 focus:outline-none rounded" />
            <input type="text" name="location" placeholder="Where?"
                class="w-full md:w-72 px-4 py-3 focus:outline-none rounded" />
            <button class="button primary w-full md:w-auto inline">
                <i class="mr-1" data-feather="search"></i> Find jobs
            </button>
        </form>
    </div>
</section>
