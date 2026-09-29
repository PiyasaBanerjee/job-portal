<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-blue-600 font-semibold mb-1">
                    Job Opportunity
                </p>

                <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                    Job Details
                </h2>
            </div>

            <a
                href="{{ route('jobs.browse') }}"
                class="hidden sm:inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-medium transition"
            >
                ← Browse Jobs
            </a>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4 flex items-start gap-3">
                    <div class="text-green-600 text-xl">
                        ✓
                    </div>

                    <div>
                        <p class="font-semibold text-green-800">
                            Success
                        </p>

                        <p class="text-green-700 text-sm mt-1">
                            {{ session('success') }}
                        </p>
                    </div>
                </div>
            @endif


            {{-- Error Message --}}
            @if(session('error'))
                <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 flex items-start gap-3">
                    <div class="text-red-600 text-xl">
                        !
                    </div>

                    <div>
                        <p class="font-semibold text-red-800">
                            Something went wrong
                        </p>

                        <p class="text-red-700 text-sm mt-1">
                            {{ session('error') }}
                        </p>
                    </div>
                </div>
            @endif


            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- LEFT SIDE --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Job Header Card --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

                        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 sm:px-8 py-8">

                            <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                                {{-- Company Icon --}}
                                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white text-3xl font-bold shadow-sm">
                                    {{ strtoupper(substr($jobPosting->company->company_name, 0, 1)) }}
                                </div>

                                <div class="text-white">

                                    <h1 class="text-3xl sm:text-4xl font-bold leading-tight">
                                        {{ $jobPosting->title }}
                                    </h1>

                                    <p class="mt-2 text-blue-100 text-lg">
                                        {{ $jobPosting->company->company_name }}
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Job Information --}}
                        <div class="p-6 sm:p-8">

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

                                {{-- Location --}}
                                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="w-11 h-11 rounded-xl bg-blue-100 flex items-center justify-center text-xl">
                                        📍
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                            Location
                                        </p>

                                        <p class="font-semibold text-gray-800 mt-1">
                                            {{ $jobPosting->location }}
                                        </p>
                                    </div>
                                </div>


                                {{-- Job Type --}}
                                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="w-11 h-11 rounded-xl bg-indigo-100 flex items-center justify-center text-xl">
                                        💼
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                            Job Type
                                        </p>

                                        <p class="font-semibold text-gray-800 mt-1">
                                            {{ $jobPosting->job_type }}
                                        </p>
                                    </div>
                                </div>


                                {{-- Salary --}}
                                <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                                    <div class="w-11 h-11 rounded-xl bg-green-100 flex items-center justify-center text-xl">
                                        💰
                                    </div>

                                    <div>
                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                            Salary
                                        </p>

                                        <p class="font-semibold text-gray-800 mt-1">
                                            {{ $jobPosting->salary }}
                                        </p>
                                    </div>
                                </div>


                                {{-- Experience --}}
                                @if($jobPosting->experience)
                                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-xl">
                                        <div class="w-11 h-11 rounded-xl bg-purple-100 flex items-center justify-center text-xl">
                                            ⭐
                                        </div>

                                        <div>
                                            <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                                Experience
                                            </p>

                                            <p class="font-semibold text-gray-800 mt-1">
                                                {{ $jobPosting->experience }}
                                            </p>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- Job Description --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sm:p-8">

                        <div class="flex items-center gap-3 mb-6">

                            <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                📄
                            </div>

                            <h2 class="text-xl font-bold text-gray-800">
                                Job Description
                            </h2>

                        </div>

                        <div class="text-gray-600 leading-7 whitespace-pre-line">
                            {{ $jobPosting->description }}
                        </div>

                    </div>


                    {{-- Apply Section --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6 sm:p-8">

                        <div class="mb-6">

                            <h2 class="text-xl font-bold text-gray-800">
                                Apply for this position
                            </h2>

                            <p class="text-gray-500 mt-1">
                                Tell the recruiter why you are a good fit for this job.
                            </p>

                        </div>


                        <form
                            method="POST"
                            action="{{ route('jobs.apply', $jobPosting->id) }}"
                        >

                            @csrf


                            <div class="mb-6">

                                <label
                                    for="cover_letter"
                                    class="block text-sm font-semibold text-gray-700 mb-2"
                                >
                                    Cover Letter
                                </label>

                                <textarea
                                    id="cover_letter"
                                    name="cover_letter"
                                    rows="7"
                                    class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm resize-none"
                                    placeholder="Write a short cover letter explaining why you are interested in this position..."
                                ></textarea>

                                @error('cover_letter')
                                    <p class="mt-2 text-sm text-red-600">
                                        {{ $message }}
                                    </p>
                                @enderror

                            </div>


                            <button
                                type="submit"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-sm hover:shadow-md transition duration-200"
                            >
                                <span>🚀</span>
                                Apply Now
                            </button>

                        </form>

                    </div>

                </div>


                {{-- RIGHT SIDE --}}
                <div class="space-y-6">

                    {{-- Quick Summary --}}
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 p-6">

                        <h3 class="text-lg font-bold text-gray-800 mb-5">
                            Job Summary
                        </h3>


                        <div class="space-y-5">

                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-500 font-semibold">
                                    Company
                                </p>

                                <p class="text-gray-800 font-semibold mt-1">
                                    {{ $jobPosting->company->company_name }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-500 font-semibold">
                                    Location
                                </p>

                                <p class="text-gray-800 font-semibold mt-1">
                                    {{ $jobPosting->location }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-500 font-semibold">
                                    Job Type
                                </p>

                                <p class="text-gray-800 font-semibold mt-1">
                                    {{ $jobPosting->job_type }}
                                </p>
                            </div>


                            <div>
                                <p class="text-xs uppercase tracking-wide text-gray-500 font-semibold">
                                    Salary
                                </p>

                                <p class="text-gray-800 font-semibold mt-1">
                                    {{ $jobPosting->salary }}
                                </p>
                            </div>


                            @if($jobPosting->experience)
                                <div>
                                    <p class="text-xs uppercase tracking-wide text-gray-500 font-semibold">
                                        Experience
                                    </p>

                                    <p class="text-gray-800 font-semibold mt-1">
                                        {{ $jobPosting->experience }}
                                    </p>
                                </div>
                            @endif


                            @if($jobPosting->deadline)
                                <div>
                                    <p class="text-xs uppercase tracking-wide text-gray-500 font-semibold">
                                        Application Deadline
                                    </p>

                                    <p class="text-gray-800 font-semibold mt-1">
                                        {{ \Carbon\Carbon::parse($jobPosting->deadline)->format('d M Y') }}
                                    </p>
                                </div>
                            @endif

                        </div>

                    </div>


                    {{-- Application Tip --}}
                    <div class="rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-700 p-6 text-white shadow-sm">

                        <div class="text-3xl mb-4">
                            💡
                        </div>

                        <h3 class="text-lg font-bold">
                            Application Tip
                        </h3>

                        <p class="text-blue-100 text-sm leading-6 mt-2">
                            Write a clear and professional cover letter. Highlight your relevant skills and explain why you are interested in this position.
                        </p>

                    </div>


                    {{-- Back Button --}}
                    <a
                        href="{{ route('jobs.browse') }}"
                        class="block w-full text-center bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 rounded-xl transition"
                    >
                        ← Back to Browse Jobs
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>