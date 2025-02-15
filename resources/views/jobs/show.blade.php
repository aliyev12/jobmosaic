<x-layout>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
        <section class="lg:col-span-3">
            <div class="rounded-lg shadow-md border bg-white p-3">
                <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center">
                    <a class="flex p-4 link" href="{{ route('jobs.index') }}">
                        <i class="mr-2" data-feather="arrow-left"></i>
                        Back To Listings
                    </a>
                    @can('update', $job)
                        <div class="flex flex-col sm:flex-row sm:space-x-3 sm:ml-4 space-y-2 sm:space-y-0 p-4">
                            <a href="{{ route('jobs.edit', $job->id) }}" class="button primary"><i class="mr-2"
                                    data-feather="edit"></i>Edit</a>
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}"
                                onsubmit="return confirm('Are you sure that you want to delete this job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button primary w-full sm:w-auto">
                                    <i class="mr-2" data-feather="trash"></i>Delete
                                </button>
                            </form>
                        </div>
                    @endcan
                </div>
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{ $job->title }}</h2>
                    <p class="mt-2">{{ $job->description }}</p>
                    <ul class="mt-4 bg-slate-500 text-white rounded-lg py-4 px-5 space-y-3">
                        <li>
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </li>
                        <li>
                            <strong>Remote:</strong> {{ $job->remote ? 'Yes' : 'No' }}
                        </li>
                        <li>
                            <strong>Salary:</strong> ${{ number_format($job->salary) }}
                        </li>
                        <li>
                            <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
                        </li>
                        @if ($job->tags)
                            <li>
                                <strong>Tags:</strong> {{ ucwords(str_replace(',', ', ', $job->tags)) }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="mx-auto mt-12">
                @if ($job->requirements || $job->benefits)
                    <h2 class="text-xl font-semibold mb-4">Job Details</h2>
                    <div class="rounded-lg shadow-md border bg-white p-6">
                        <h3 class="text-lg font-semibold mb-2 ">
                            Job Requirements
                        </h3>
                        <p>{{ $job->requirements }}</p>
                        <h3 class="text-lg font-semibold mt-4 mb-2 ">
                            Benefits
                        </h3>
                        <p>{{ $job->benefits }}</p>
                    </div>
                @endif

                @auth
                    <p class="my-8">
                        Put "Job Application" as the subject of your email
                        and attach your resume.
                    </p>


                    <div x-data="{ open: false }" id="applicant-form">
                        @if ($existingApplication)
                            <p class="my-5">
                                You have already applied to this job
                            </p>
                            <button class="button primary" disabled>
                                <i data-feather="send" class="mr-2"></i> Apply now
                            </button>
                        @else
                            <button @click="open = true" class="button primary">
                                <i data-feather="send" class="mr-2"></i> Apply now
                            </button>
                        @endif


                        <div x-cloak x-show="open"
                            class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 overflow-y-auto p-4">
                            <div @click.away="open = false" class="bg-white p-6 rounded-lg shadow-md w-full max-w-md my-8">
                                <h3 class="text-lg font-semibold mb-4">Apply For {{ $job->title }}</h3>
                                <form method="POST" enctype="multipart/form-data"
                                    action="{{ route('applicant.store', $job->id) }}">
                                    @csrf
                                    <x-inputs.text id="full_name" name="full_name" label="Full Name" :required="true" />
                                    <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" />
                                    <x-inputs.text id="contact_email" name="contact_email" label="Contact Email"
                                        type="email" :required="true" />
                                    <x-inputs.text-area id="message" name="message" label="Message" />
                                    <x-inputs.text id="location" name="location" label="Location" />

                                    <div class="mb-4">
                                        <label for="resume" class="block mb-2">Upload Your Resume (PDF)</label>
                                        <div class="relative">
                                            <input type="file" id="resume" name="resume" required
                                                class="opacity-0 absolute inset-0 w-full h-full cursor-pointer"
                                                accept=".pdf">
                                            <button type="button" class="button primary w-full">
                                                <i data-feather="upload" class="mr-2"></i> Choose File
                                            </button>
                                        </div>
                                    </div>

                                    <div class="flex space-x-4">
                                        <button type="submit" class="button primary">Submit
                                            Application</button>
                                        <button @click="open = false" type="button" class="button primary">Cancel</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="my-5 flex bg-gray-600 rounded-lg p-3 text-white">
                        <i class="mr-2" data-feather="bookmark"></i> You must be logged in to apply for this job.
                    </p>
                @endauth

            </div>

            <div class="bg-white p-6 rounded-lg shadow-md mt-6 map-container">
                <div id="map"></div>
            </div>
        </section>

        <aside class="bg-white rounded-lg shadow-md border p-6">
            <h3 class="text-xl text-center mb-4 font-bold">
                Company Info
            </h3>
            @if ($job->company_logo)
                <img src="/storage/{{ $job->company_logo }}" alt="Ad" class="w-full rounded-lg mb-4 m-auto" />
            @endif
            <h4 class="text-lg font-bold">{{ $job->company_name }}</h4>
            @if ($job->company_description)
                <p class="text-lg my-3">{{ $job->company_description }}</p>
            @endif
            @if ($job->company_website)
                <a href="{{ $job->company_website }}" target="_blank" class="link">Visit Website</a>
            @endif

            {{-- Bookmark Button --}}
            @guest
                <p class="mt-10 font-bold w-full py-2 px-4 rounded  flex">
                    <i class="mr-3" data-feather="info"></i> You must be logged in to bookmark a job
                </p>
            @else
                <form method="POST"
                    action="{{ auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists() ? route('bookmarks.destroy', $job->id) : route('bookmarks.store', $job->id) }}"
                    class="mt-5">
                    @csrf
                    @if (auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists())
                        @method('DELETE')
                        <button type="submit" class="button primary w-full sm:w-auto">
                            <i class="mr-3" data-feather="bookmark"></i> Remove Bookmark
                        </button>
                    @else
                        <button type="submit" class="button primary w-full sm:w-auto">
                            <i class="mr-3" data-feather="bookmark"></i> Bookmark Listing
                        </button>
                    @endif
                </form>
            @endguest


        </aside>
    </div>
</x-layout>

<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
<script>
    const city = '{{ $job->city }}';
    const state = '{{ $job->state }}';
    const address = city + ', ' + state;

    fetch(`/geocode?address=${encodeURIComponent(address)}`)
        .then(response => response.json())
        .then(data => {
            if (data?.results?.length && data?.results[0] && data?.results[0]?.geometry) {
                const {
                    lat,
                    lng
                } = data.results[0].geometry;

                // Add the location to your Leaflet map
                const map = L.map('map').setView([lat, lng], 13);

                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '© OpenStreetMap contributors'
                }).addTo(map);

                // Add a marker to the map
                const marker = L.marker([lat, lng]).addTo(map);
            } else {
                const mapContainer = document.querySelector('.map-container')
                if (mapContainer) {
                    mapContainer.style.display = 'none';
                }
            }
        })
        .catch(error => console.error('Error:', error));
</script>
