<form method="GET" action="{{ route('jobs.search') }}"
  class="flex mx-5 space-y-2 md:space-y-0 md:mx-auto md:space-x-2 items-center">
  <input value="{{ request('keywords') }}" type="text" name="keywords" placeholder="What you're looking for?"
    class="w-full md:w-72 px-4 py-3 focus:outline-none rounded" />
  <input value="{{ request('location') }}" type="text" name="location" placeholder="Where?"
    class="w-full md:w-72 px-4 py-3 focus:outline-none rounded" />
  <button class="button primary w-full md:w-auto inline">
    <i class="mr-1" data-feather="search"></i> Find jobs
  </button>
</form>
