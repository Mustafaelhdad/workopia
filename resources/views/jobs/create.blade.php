<x-layout>
    <x-slot name="title">Create Job</x-slot>

    <h1>Create new job</h1>
    <form action="/jobs" method="POST">
        @csrf

        <div class="my-5">
            <input name="title" type="text" value="{{ old("title") }}" placeholder="title">
            @error("title")
                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-5">
            <input name="description" type="text" value="{{ old("description") }}" placeholder="description">
            @error("description")
                <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Submit</button>
    </form>
</x-layout>
