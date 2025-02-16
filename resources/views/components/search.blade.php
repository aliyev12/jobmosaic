<form method="GET" action="{{ route('jobs.search') }}"
    class="flex flex-col md:flex-row md:mx-5 space-y-2 md:space-y-0 md:mx-auto md:space-x-2 justify-center items-center w-full">
    <input value="{{ request('keywords') }}" type="text" name="keywords" placeholder="What you're looking for?"
        class="placeholder-foreground w-full md:w-72 px-4 py-3 focus:outline-none rounded-lg border border-slate-500" />
    <input value="{{ request('location') }}" type="text" name="location" placeholder="Where?"
        class="placeholder-foreground w-full md:w-72 px-4 py-3 focus:outline-none border border-slate-500 rounded-lg" />
    <button class="button primary w-full md:w-auto flex justify-center items-center">
        <i class="mr-1" data-feather="search"></i> Find jobs
    </button>
</form>
