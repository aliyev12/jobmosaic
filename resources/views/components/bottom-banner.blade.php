@props([
    'heading' => 'Are you an employer?',
    'subHeading' => 'Publish your job opening today and discover top talent.',
])

<section class="container mx-auto my-6">
    <div class="bg-indigo-700 text-white rounded p-4 flex items-center justify-between flex-col md:flex-row gap-4">
        <div>
            <h2 class="text-xl font-semibold">{{ $heading }}</h2>
            <p class="text-white text-lg mt-2">{{ $subHeading }}</p>
        </div>
        <x-button-link url="/jobs/create" icon="plus" variant="secondary">Post a Job</x-button-link>
    </div>
</section>
