<x-layout>
    <x-slot name="title">Available Jobs</x-slot>

    <div class="mb-6 grid grid-cols-1 gap-4 md:grid-cols-3">
        @forelse ($jobs as $job)
            <x-job-card :job='$job' />
        @empty
            <li>No jobs available</li>
        @endforelse
    </div>
</x-layout>
