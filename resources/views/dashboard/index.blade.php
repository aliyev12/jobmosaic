<x-layout>
    <section class="flex flex-col xl:flex-row gap-4">
        {{-- Profile Info Form --}}
        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-md w-full border">
            <h3 class="text-3xl text-center font-bold mb-4">Profile Info</h3>

            @if ($user->avatar)
                <div class="mt-2 flex justify-center">
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="User avatar"
                        class="w-32 h-32 object-cover rounded-full">
                </div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <x-inputs.text id="name" name="name" label="Name" value="{{ $user->name }}" />
                <x-inputs.text id="email" name="email" label="Email" value="{{ $user->email }}"
                    type="email" />
                <x-inputs.file id="avatar" name="avatar" label="Upload avatar" />

                <button type="submit" class="button primary"><i class="mr-2" data-feather="save"></i> Save</button>
            </form>
        </div>

        {{-- Job Listings --}}
        <div class="bg-white p-4 sm:p-8 rounded-lg shadow-md w-full border">
            <h3 class="text-3xl text-center font-bold mb-4">My Job Listings</h3>
            @forelse($jobs as $job)
                <div class="mb-8 bg-gray-50 rounded-lg p-3 sm:p-6 shadow-sm border border-gray-200">
                    <div class="flex flex-col space-y-3">
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-800">{{ $job->title }}</h3>
                            <div class="flex flex-col sm:hidden space-y-4 mt-2">
                                <a href="{{ route('jobs.edit', $job->id) }}" class="button primary">
                                    <i class="mr-2" data-feather="edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
                                    onsubmit="return confirm('Are you sure that you want to delete this job?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button primary w-full">
                                        <i class="mr-2" data-feather="trash-2"></i> Delete
                                    </button>
                                </form>
                            </div>
                            <span class="inline-block px-3 py-1 mt-2 bg-slate-500 text-white rounded-full text-sm">
                                {{ $job->job_type }}
                            </span>
                        </div>
                        <div class="hidden sm:flex justify-end space-x-3">
                            <a href="{{ route('jobs.edit', $job->id) }}" class="button primary">
                                <i class="mr-2" data-feather="edit"></i> Edit
                            </a>
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}?from=dashboard"
                                onsubmit="return confirm('Are you sure that you want to delete this job?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button primary w-full sm:w-auto">
                                    <i class="mr-2" data-feather="trash-2"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Applicants --}}
                    <div class="mt-6 bg-white p-3 sm:p-4 rounded-lg border border-gray-200">
                        <h4 class="text-lg font-semibold mb-4 flex items-center">
                            <i class="mr-2" data-feather="users"></i> Applicants
                        </h4>
                        @forelse ($job->applicants as $applicant)
                            <div class="border-b border-gray-100 last:border-0 py-4">
                                <div class="grid grid-cols-2 gap-4">
                                    <p class="text-gray-800">
                                        <strong class="text-gray-600">Name: </strong> {{ $applicant->full_name }}
                                    </p>
                                    <p class="text-gray-800">
                                        <strong class="text-gray-600">Phone: </strong> {{ $applicant->contact_phone }}
                                    </p>
                                    <p class="text-gray-800">
                                        <strong class="text-gray-600">Email: </strong> {{ $applicant->contact_email }}
                                    </p>
                                </div>
                                <p class="text-gray-800 mt-2">
                                    <strong class="text-gray-600">Message: </strong> {{ $applicant->message }}
                                </p>
                                <div
                                    class="mt-4 flex flex-col sm:flex-row sm:justify-between sm:items-center space-y-2 sm:space-y-0">
                                    <a href="{{ asset('storage/' . $applicant->resume_path) }}"
                                        class="link flex items-center justify-center sm:justify-start" download>
                                        <i class="mr-2" data-feather="download"></i> Download Resume
                                    </a>
                                    {{-- Delete Applicant --}}
                                    <form method="POST" action="{{ route('applicant.destroy', $applicant->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this applicant?')"
                                        class="w-full sm:w-auto">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button primary w-full sm:w-auto">
                                            <i class="mr-2" data-feather="trash-2"></i> Delete Applicant
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-700">No applicants for this job</p>
                        @endforelse
                    </div>
                </div>
            @empty
                <p class="text-gray-700">You have no job listings</p>
            @endforelse
        </div>
    </section>
    <x-bottom-banner />
</x-layout>
