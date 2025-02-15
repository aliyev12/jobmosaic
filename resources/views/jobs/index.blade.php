<x-layout>
    <div class="h-24 px-4 mb-4 flex justify-center items-center ">
        <x-search />
    </div>

    {{-- Back Button --}}
    @if (request()->has('keywords') || request()->has('location'))
        <a href="{{ route('jobs.index') }}" class="button primary w-fit">
            <i class="mr-2" data-feather="arrow-left"></i> Back
        </a>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        @forelse ($jobs as $job)
            <x-job-card :job="$job" />
        @empty
            <p class="mt-8">No jobs available</p>
        @endforelse
    </div>

    {{-- Pagination Links --}}
    {{ $jobs->links() }}
</x-layout>
