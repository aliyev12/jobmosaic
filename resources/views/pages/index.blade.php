<x-layout>
    <h2 class="text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Welcome To Job Mosaic</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse ($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p>No jobs available</p>
        @endforelse
    </div>

    <div class="flex justify-center w-full">
        <a href="{{ route('jobs.index') }}" class="flex text-xl text-center justify-center items-center">
            <i class="mr-2" data-feather="arrow-right-circle"></i>
            Show all jobs
        </a>
    </div>


    <x-bottom-banner />
</x-layout>
