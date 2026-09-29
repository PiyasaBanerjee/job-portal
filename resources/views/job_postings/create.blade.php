<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Recruiter Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Create Job Posting
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex items-center gap-4 mb-4">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                        💼
                    </div>

                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            Post a New Job
                        </h1>

                        <p class="text-gray-500 mt-1">
                            Create a professional job posting and start receiving applications.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Form Card --}}
            <div class="bg-white border border-gray-200 rounded-2xl shadow-sm overflow-hidden">

                {{-- Card Header --}}
                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 sm:px-8 py-6 text-white">

                    <h2 class="text-xl font-bold">
                        Job Information
                    </h2>

                    <p class="text-blue-100 text-sm mt-1">
                        Enter the details about the position you want to hire for.
                    </p>

                </div>


                <div class="p-6 sm:p-8">

                    {{-- Error Message --}}
                    @if(session('error'))

                        <div class="mb-6 flex items-start gap-3 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">

                            <span class="text-xl">
                                ⚠️
                            </span>

                            <div>
                                <p class="font-semibold">
                                    Something went wrong
                                </p>

                                <p class="text-sm mt-1">
                                    {{ session('error') }}
                                </p>
                            </div>

                        </div>

                    @endif


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


                    <form method="POST" action="{{ route('job-postings.store') }}">

                        @csrf


                        {{-- Job Title --}}
                        <div class="mb-6">

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
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
                                    value="{{ old('location') }}"
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
                                    value="{{ old('salary') }}"
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

                                <option value="Full Time" {{ old('job_type') == 'Full Time' ? 'selected' : '' }}>
                                    Full Time
                                </option>

                                <option value="Part Time" {{ old('job_type') == 'Part Time' ? 'selected' : '' }}>
                                    Part Time
                                </option>

                                <option value="Internship" {{ old('job_type') == 'Internship' ? 'selected' : '' }}>
                                    Internship
                                </option>

                                <option value="Contract" {{ old('job_type') == 'Contract' ? 'selected' : '' }}>
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
                            >{{ old('description') }}</textarea>

                        </div>


                        {{-- Bottom Actions --}}
                        <div class="border-t border-gray-100 pt-6 flex flex-col sm:flex-row gap-3 sm:justify-end">

                            <a
                                href="{{ route('job-postings.index') }}"
                                class="inline-flex items-center justify-center px-6 py-3 rounded-xl border border-gray-300 text-gray-700 font-semibold hover:bg-gray-50 transition"
                            >
                                Cancel
                            </a>


                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-7 py-3 rounded-xl shadow-sm transition"
                            >
                                🚀 Post Job
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Helpful Tip --}}
            <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-5">

                <div class="flex items-start gap-3">

                    <div class="text-2xl">
                        💡
                    </div>

                    <div>

                        <h3 class="font-semibold text-blue-900">
                            Recruitment Tip
                        </h3>

                        <p class="text-sm text-blue-700 mt-1">
                            Write a clear job title and detailed description. Mention the required skills,
                            responsibilities and qualifications to attract suitable candidates.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>