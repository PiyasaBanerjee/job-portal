<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Recruiter Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Edit Job Posting
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-amber-100 flex items-center justify-center text-3xl">
                        ✏️
                    </div>

                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            Edit Job Posting
                        </h1>

                        <p class="text-gray-500 mt-1">
                            Update the details of your job opportunity.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Form Card --}}
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                {{-- Card Header --}}
                <div class="bg-gradient-to-r from-amber-500 to-orange-500 px-6 sm:px-8 py-6 text-white">

                    <h2 class="text-xl font-bold">
                        Job Information
                    </h2>

                    <p class="text-amber-100 text-sm mt-1">
                        Make changes to the job details below.
                    </p>

                </div>


                <div class="p-6 sm:p-8">

                    {{-- Validation Errors --}}
                    @if($errors->any())

                        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">

                            <div class="flex items-center gap-2 mb-2">

                                <span class="text-xl">
                                    ⚠️
                                </span>

                                <p class="font-semibold">
                                    Please fix the following errors:
                                </p>

                            </div>

                            <ul class="list-disc ml-7 text-sm space-y-1">

                                @foreach($errors->all() as $error)

                                    <li>
                                        {{ $error }}
                                    </li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <form
                        method="POST"
                        action="{{ route('job-postings.update', $jobPosting->id) }}"
                    >

                        @csrf
                        @method('PUT')


                        {{-- Job Title --}}
                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title', $jobPosting->title) }}"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3"
                                placeholder="Example: PHP Laravel Developer"
                            >

                        </div>


                        {{-- Location + Salary --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                            <div>

                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    📍 Location
                                </label>

                                <input
                                    type="text"
                                    name="location"
                                    value="{{ old('location', $jobPosting->location) }}"
                                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3"
                                    placeholder="Example: Kolkata"
                                >

                            </div>


                            <div>

                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    💰 Salary
                                </label>

                                <input
                                    type="text"
                                    name="salary"
                                    value="{{ old('salary', $jobPosting->salary) }}"
                                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3"
                                    placeholder="Example: 30000 - 50000"
                                >

                            </div>

                        </div>


                        {{-- Job Type --}}
                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                🕒 Job Type
                            </label>

                            <select
                                name="job_type"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3"
                            >

                                <option value="Full Time"
                                    {{ old('job_type', $jobPosting->job_type) == 'Full Time' ? 'selected' : '' }}>
                                    Full Time
                                </option>

                                <option value="Part Time"
                                    {{ old('job_type', $jobPosting->job_type) == 'Part Time' ? 'selected' : '' }}>
                                    Part Time
                                </option>

                                <option value="Internship"
                                    {{ old('job_type', $jobPosting->job_type) == 'Internship' ? 'selected' : '' }}>
                                    Internship
                                </option>

                                <option value="Contract"
                                    {{ old('job_type', $jobPosting->job_type) == 'Contract' ? 'selected' : '' }}>
                                    Contract
                                </option>

                            </select>

                        </div>


                        {{-- Job Description --}}
                        <div class="mb-8">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                📝 Job Description
                            </label>

                            <textarea
                                name="description"
                                rows="7"
                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3"
                                placeholder="Describe the job responsibilities, required skills, qualifications, experience, etc."
                            >{{ old('description', $jobPosting->description) }}</textarea>

                        </div>


                        {{-- Actions --}}
                        <div class="border-t border-gray-100 pt-6 flex flex-col sm:flex-row gap-3 sm:justify-end">

                            <a
                                href="{{ route('job-postings.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition"
                            >
                                Cancel
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-amber-500 hover:bg-amber-600 text-white font-semibold px-7 py-3 rounded-xl shadow-sm transition"
                            >
                                💾 Update Job
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Helpful Tip --}}
            <div class="mt-6 bg-amber-50 border border-amber-100 rounded-2xl p-5">

                <div class="flex items-start gap-3">

                    <div class="text-2xl">
                        💡
                    </div>

                    <div>

                        <h3 class="font-semibold text-amber-900">
                            Keep your job posting updated
                        </h3>

                        <p class="text-sm text-amber-700 mt-1">
                            Make sure the salary, location, job type and description accurately
                            represent the current opportunity.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>