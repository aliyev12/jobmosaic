@props(['job'])

<div class="rounded-lg shadow-md bg-white p-4 flex flex-col border">
    <div class="flex items-center space-between gap-4">
        @if ($job->company_logo)
            <img src="/storage/{{ $job->company_logo }}" alt="{{ $job->company_name }}" class="w-14" />
        @endif
        <div>
            <h2 class="text-xl font-semibold">{{ $job->title }}</h2>
            <p class="text-sm text-gray-500">{{ $job->job_type }}</p>
        </div>
    </div>
    <p class="mt-2 mb-5">{{ Str::limit($job->description, 100) }}</p>
    <ul class="my-4 mt-auto">
        <li class="mb-2"><strong>Salary:</strong> ${{ number_format($job->salary) }}</li>
        <li class="mb-2">
            <strong>Location:</strong> {{ $job->city }}, {{ $job->state }}
            @if ($job->remote)
                <span
                    class="text-xs bg-slate-500 text-white rounded-full px-2 py-1 ml-2 whitespace-nowrap">Remote</span>
            @else
                <span
                    class="text-xs bg-slate-500 text-white rounded-full px-2 py-1 ml-2 whitespace-nowrap">On-site</span>
            @endif
        </li>
        @if ($job->tags)
            <li class="mb-2"><strong>Tags:</strong> {{ ucwords(str_replace(',', ', ', $job->tags)) }}</li>
        @endif
    </ul>
    <a href="{{ route('jobs.show', $job->id) }}" class="button primary w-full">
        <i data-feather="info" class="mr-2"></i> Details
    </a>
</div>
