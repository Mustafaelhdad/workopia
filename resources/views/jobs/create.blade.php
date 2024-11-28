<x-layout>
    <x-slot name="title">Create Job</x-slot>

    <div class="mx-auto w-full rounded-lg bg-white p-8 shadow-md md:max-w-3xl">
        <h2 class="mb-4 text-center text-4xl font-bold">
            Create Job Listing
        </h2>
        <form method="POST" action="{{ route("jobs.index") }}" enctype="multipart/form-data">
            @csrf
            <h2 class="mb-6 text-center text-2xl font-bold text-gray-500">
                Job Info
            </h2>

            <x-inputs.text id='title' name="title" label="Job Title" placeholder='Software Engineer' />

            <div class="mb-4">
                <label class="block text-gray-700" for="description">Job Description</label>
                <textarea class="@error("description") border-red-500 @enderror w-full rounded border px-4 py-2 focus:outline-none"
                    id="description" name="description" cols="30" rows="7"
                    placeholder="We are seeking a skilled and motivated Software Developer to join our growing development team...">{{ old("description") }}</textarea>

                @error("description")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <x-inputs.text id='salary' name="salary" type='number' label="Salary" placeholder='90000' />

            <div class="mb-4">
                <label class="block text-gray-700" for="requirements">Requirements</label>
                <textarea class="w-full rounded border px-4 py-2 focus:outline-none" id="requirements" name="requirements"
                    placeholder="Bachelor's degree in Computer Science"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="benefits">Benefits</label>
                <textarea class="w-full rounded border px-4 py-2 focus:outline-none" id="benefits" name="benefits"
                    placeholder="Health insurance, 401k, paid time off"></textarea>
            </div>

            <x-inputs.text id='tags' name="tags" label="Tags (comma-separated)"
                placeholder='development, coding, java, python' />

            <div class="mb-4">
                <label class="block text-gray-700" for="job_type">Job Type</label>
                <select
                    class="@error("job_type") border-red-500 @enderror w-full rounded border px-4 py-2 focus:outline-none"
                    id="job_type" name="job_type">
                    <option value="Full-Time" {{ old("job_type") == "Full-Time" ? "selected" : "" }}>
                        Full-Time
                    </option>
                    <option value="Part-Time" {{ old("job_type") == "Part-Time" ? "selected" : "" }}>
                        Part-Time
                    </option>
                    <option value="Contract" {{ old("job_type") == "Contract" ? "selected" : "" }}>
                        Contract
                    </option>
                    <option value="Temporary" {{ old("job_type") == "Temporary" ? "selected" : "" }}>
                        Temporary
                    </option>
                    <option value="Internship" {{ old("job_type") == "Internship" ? "selected" : "" }}>
                        Internship
                    </option>
                    <option value="Volunteer" {{ old("job_type") == "Volunteer" ? "selected" : "" }}>
                        Volunteer
                    </option>
                    <option value="On-Call" {{ old("job_type") == "On-Call" ? "selected" : "" }}>
                        On-Call
                    </option>
                </select>

                @error("job_type")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700" for="remote">Remote</label>
                <select class="w-full rounded border px-4 py-2 focus:outline-none" id="remote" name="remote">
                    <option value="false">No</option>
                    <option value="true">Yes</option>
                </select>
            </div>

            <x-inputs.text id='address' name="address" label="Address" placeholder='123 Main St' />

            <x-inputs.text id='city' name="city" label="City" placeholder='Albany' />

            <x-inputs.text id='state' name="state" label="State" placeholder='NY' />

            <x-inputs.text id='zipcode' name="zipcode" label="ZIP Code" placeholder='12201' />

            <h2 class="mb-6 text-center text-2xl font-bold text-gray-500">
                Company Info
            </h2>

            <x-inputs.text id="company_name" name="company_name" label="Company Name" placeholder="Company name" />


            <div class="mb-4">
                <label class="block text-gray-700" for="company_description">Company Description</label>
                <textarea class="w-full rounded border px-4 py-2 focus:outline-none" id="company_description" name="company_description"
                    placeholder="Company Description"></textarea>
            </div>

            <x-inputs.text id="company_website" name="company_website" type='url' label="Company Website"
                placeholder="Enter company website" />

            <x-inputs.text id="contact_phone" name="contact_phone" label="Contact Phone"
                placeholder="Enter contact phone number" />

            <x-inputs.text id="contact_email" name="contact_email" type='email' label="Contact Email"
                placeholder="Enter contact email" />


            <div class="mb-4">
                <label class="block text-gray-700" for="company_logo">Company Logo</label>
                <input
                    class="@error("company_logo") border-red-500 @enderror w-full rounded border px-4 py-2 focus:outline-none"
                    id="company_logo" name="company_logo" type="file" />

                @error("company_logo")
                    <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <button class="my-3 w-full rounded bg-green-500 px-4 py-2 text-white hover:bg-green-600 focus:outline-none"
                type="submit">
                Save
            </button>
        </form>
    </div>
</x-layout>
