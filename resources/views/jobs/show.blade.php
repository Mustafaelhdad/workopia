<x-layout>
    <div class="grid grid-cols-1 gap-6 md:grid-cols-4">
        <section class="md:col-span-3">
            <div class="rounded-lg bg-white p-3 shadow-md">
                <div class="flex items-center justify-between">
                    <a class="block p-4 text-blue-700" href="{{ route('jobs.index') }}">
                        <i class="fa fa-arrow-alt-circle-left"></i>
                        Back To Listings
                    </a>
                    @can('update', $job)
                        <div class="ml-4 flex space-x-3">
                            <a class="rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                                href="{{ route('jobs.edit', $job->id) }}">Edit</a>
                            <!-- Delete Form -->
                            <form method="POST" action="{{ route('jobs.destroy', $job->id) }}"
                                onsubmit="return confirm('Are you sure that you want to delete this job?')">
                                @csrf
                                @method('DELETE')

                                <button class="rounded bg-red-500 px-4 py-2 text-white hover:bg-red-600" type="submit">
                                    Delete
                                </button>
                            </form>
                            <!-- End Delete Form -->
                        </div>
                    @endcan
                </div>
                <div class="p-4">
                    <h2 class="text-xl font-semibold">
                        {{ $job->title }}
                    </h2>
                    <p class="mt-2 text-lg text-gray-700">
                        {{ $job->description }}
                    </p>
                    <ul class="my-4 bg-gray-100 p-4">
                        <li class="mb-2">
                            <strong>Job Type:</strong> {{ $job->job_type }}
                        </li>
                        <li class="mb-2">
                            <strong>Remote:</strong> {{ $job->remote ? 'Yes' : 'No' }}
                        </li>
                        <li class="mb-2">
                            <strong>Salary:</strong> ${{ number_format($job->salary) }}
                        </li>
                        <li class="mb-2">
                            <strong>Site Location:</strong> {{ $job->city }}, {{ $job->state }}
                        </li>

                        @if ($job->tags)
                            <li class="mb-2">
                                <strong>Tags:</strong>
                                {{ ucwords(str_replace(',', ', ', $job->tags)) }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="container mx-auto p-4">
                @if ($job->requirements || $job->benefits)
                    <h2 class="mb-4 text-xl font-semibold">Job Details</h2>
                    <div class="rounded-lg bg-white p-4 shadow-md">
                        <h3 class="mb-2 text-lg font-semibold text-blue-500">
                            Job Requirements
                        </h3>
                        <p>
                            {{ $job->requirements }}
                        </p>
                        <h3 class="mb-2 mt-4 text-lg font-semibold text-blue-500">
                            Benefits
                        </h3>
                        <p>
                            {{ $job->benefits }}
                        </p>
                    </div>
                @endif

                @auth
                    <p class="my-5">
                        Put "Job Application" as the subject of your email
                        and attach your resume.
                    </p>

                    <div id="applicant-form" x-data="{ open: false }">
                        <button
                            class="block w-full cursor-pointer rounded border bg-indigo-100 px-5 py-2.5 text-center text-base font-medium text-indigo-700 shadow-sm hover:bg-indigo-200"
                            @click="open = true">
                            Apply Now
                        </button>

                        <div class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50" x-cloak
                            x-show="open">
                            <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-md" @click.away="open = false">
                                <h3 class="mb-4 text-lg font-semibold">
                                    Apply For {{ $job->title }}
                                </h3>
                                <form method="POST" action="{{ route('applicant.store', $job->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <x-inputs.text id="full_name" name="full_name" label="Full Name" :required="true" />
                                    <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone" />
                                    <x-inputs.text id="contact_email" name="contact_email" label="Contact Email"
                                        :required="true" />
                                    <x-inputs.text-area id="message" name="message" label="Message" />
                                    <x-inputs.text id="location" name="location" label="Location" />
                                    <x-inputs.file id="resume" name="resume" label="Upload Your Resume (pdf)"
                                        :required="true" />

                                    <button class="rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                                        type="submit">Submit
                                        Application</button>
                                    <button class="rounded-md bg-gray-300 px-4 py-2 text-black hover:bg-gray-400"
                                        @click="open = false">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="my-5 rounded-xl bg-gray-200 p-3">
                        <i class="fas fa-info-circle mr-3"></i> You must be logged in to apply for this job
                    </p>
                @endauth
            </div>

            {{-- <div class="mt-6 rounded-lg bg-white p-6 shadow-md">
                <div id="map"></div>
            </div> --}}
        </section>

        <aside class="rounded-lg bg-white p-3 shadow-md">
            <h3 class="mb-4 text-center text-xl font-bold">
                Company Info
            </h3>

            @if ($job->company_logo)
                <img class="m-auto mb-4 w-full rounded-lg" src="/images/{{ $job->company_logo }}" alt="Ad" />
            @endif

            <h4 class="text-lg font-bold">{{ $job->company_name }}</h4>

            @if ($job->company_description)
                <p class="my-3 text-lg text-gray-700">
                    {{ $job->company_description }}
                </p>
            @endif

            @if ($job->company_website)
                <a class="text-blue-500" href="{{ $job->company_website }}" target="_blank">Visit Website</a>
            @endif

            {{-- Bookmark Button --}}
            @guest
                <p class="mt-10 w-full rounded-full bg-gray-200 px-4 py-2 text-center font-bold text-gray-700">
                    <i class="fas fa-info-circle mr-3"></i> You must be logged in to bookmark a job
                </p>
            @else
                <form class="mt-10" method="POST"
                    action="{{ auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists()? route('bookmarks.destroy', $job->id): route('bookmarks.store', $job->id) }}">
                    @csrf

                    @if (auth()->user()->bookmarkedJobs()->where('job_id', $job->id)->exists())
                        @method('DELETE')
                        <button
                            class="flex w-full items-center justify-center rounded-full bg-red-500 px-4 py-2 font-bold text-white hover:bg-red-600">
                            <i class="fas fa-bookmark mr-3"></i> Remove Bookmark
                        </button>
                    @else
                        <button
                            class="flex w-full items-center justify-center rounded-full bg-blue-500 px-4 py-2 font-bold text-white hover:bg-blue-600">
                            <i class="fas fa-bookmark mr-3"></i> Bookmark Listing
                        </button>
                    @endif
                </form>
            @endguest
        </aside>
    </div>
</x-layout>
