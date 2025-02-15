@props([
    'heading' => 'Are you an employer?',
    'subHeading' => 'Publish your job opening today and discover top talent.',
])

<section class="container mx-auto mt-12 mb-6">
    <div class="bg-slate-500 text-white rounded-lg p-6 flex items-center justify-between flex-col md:flex-row gap-4">
        <div>
            <h2 class="text-xl font-semibold text-center md:text-left">{{ $heading }}</h2>
            <p class="text-white text-lg mt-2 mb-4">{{ $subHeading }}</p>
        </div>
        <x-button-link url="/jobs/create" icon="plus" variant="secondary">Post a Job</x-button-link>
    </div>
</section>
