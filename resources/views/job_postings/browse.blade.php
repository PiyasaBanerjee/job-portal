<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="font-bold text-2xl text-gray-800">
                Browse Jobs
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Find the right opportunity for your career
            </p>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Page Heading -->

            <div class="mb-8">

                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">

                    <div>
                        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                            Career Opportunities
                        </p>

                        <h1 class="text-3xl font-bold text-gray-900 mt-2">
                            Find Your Next Job
                        </h1>

                        <p class="text-gray-500 mt-2">
                            Explore available positions and find an opportunity
                            that matches your skills.
                        </p>
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ $jobPostings->count() }} job(s) found
                    </div>

                </div>

            </div>


            <!-- Search & Filter -->

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-8">

                <div class="flex items-center gap-3 mb-5">

                    <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center">
                        🔎
                    </div>

                    <div>
                        <h2 class="font-bold text-gray-800">
                            Search Jobs
                        </h2>

                        <p class="text-sm text-gray-500">
                            Filter jobs according to your preferences
                        </p>
                    </div>

                </div>


                <form method="GET" action="{{ route('jobs.browse') }}">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                        <!-- Search -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job Title
                            </label>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                placeholder="e.g. Laravel Developer"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Location -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Location
                            </label>

                            <input
                                type="text"
                                name="location"
                                value="{{ request('location') }}"
                                placeholder="e.g. Kolkata"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Job Type -->

                        <div>

                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Job Type
                            </label>

                            <select
                                name="job_type"
                                class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500"
                            >

                                <option value="">
                                    All Job Types
                                </option>

                                <option value="Full Time"
                                    {{ request('job_type') == 'Full Time' ? 'selected' : '' }}>
                                    Full Time
                                </option>

                                <option value="Part Time"
                                    {{ request('job_type') == 'Part Time' ? 'selected' : '' }}>
                                    Part Time
                                </option>

                                <option value="Internship"
                                    {{ request('job_type') == 'Internship' ? 'selected' : '' }}>
                                    Internship
                                </option>

                            </select>

                        </div>

                    </div>


                    <!-- Buttons -->

                    <div class="flex flex-wrap gap-3 mt-5">

                        <button
                            type="submit"
                            class="inline-flex items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition"
                        >
                            🔍
                            <span class="ml-2">
                                Search Jobs
                            </span>
                        </button>


                        <a
                            href="{{ route('jobs.browse') }}"
                            class="inline-flex items-center px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition"
                        >
                            ↻
                            <span class="ml-2">
                                Clear Filters
                            </span>
                        </a>

                    </div>

                </form>

            </div>


            <!-- Job Listings -->

            @if($jobPostings->count() > 0)

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    @foreach($jobPostings as $job)

                        <div class="group bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition duration-300 p-6">

                            <!-- Job Header -->

                            <div class="flex items-start justify-between gap-4">

                                <div class="flex items-start gap-4">

                                    <div class="w-14 h-14 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center text-2xl">
                                        💼
                                    </div>

                                    <div>

                                        <h2 class="text-xl font-bold text-gray-900 group-hover:text-blue-600 transition">
                                            {{ $job->title }}
                                        </h2>

                                        <p class="text-gray-500 mt-1">
                                            🏢 {{ $job->company->company_name }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            <!-- Job Information -->

                            <div class="flex flex-wrap gap-2 mt-5">

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-50 text-blue-700">
                                    📍 {{ $job->location }}
                                </span>

                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-green-50 text-green-700">
                                    🕒 {{ $job->job_type }}
                                </span>

                                @if($job->experience)

                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-50 text-purple-700">
                                        🎓 {{ $job->experience }}
                                    </span>

                                @endif

                            </div>


                            <!-- Salary -->

                            @if($job->salary)

                                <div class="mt-5">

                                    <p class="text-sm text-gray-500">
                                        Salary
                                    </p>

                                    <p class="text-lg font-bold text-gray-800 mt-1">
                                        💰 {{ $job->salary }}
                                    </p>

                                </div>

                            @endif


                            <!-- Description -->

                            <p class="text-sm text-gray-500 leading-relaxed mt-5">
                                {{ \Illuminate\Support\Str::limit($job->description, 150) }}
                            </p>


                            <!-- Footer -->

                            <div class="flex items-center justify-between gap-4 mt-6 pt-5 border-t border-gray-100">

                                <div>

                                    @if($job->deadline)

                                        <p class="text-xs text-gray-400">
                                            Application Deadline
                                        </p>

                                        <p class="text-sm font-semibold text-gray-700 mt-1">
                                            📅 {{ $job->deadline }}
                                        </p>

                                    @endif

                                </div>


                                <a
                                    href="{{ route('jobs.show', $job->id) }}"
                                    class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold text-sm transition"
                                >
                                    View Job
                                    <span class="ml-2">
                                        →
                                    </span>
                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <!-- Empty State -->

                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm text-center py-16 px-6">

                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-50 flex items-center justify-center text-4xl mb-5">
                        🔎
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        No Jobs Found
                    </h2>

                    <p class="text-gray-500 mt-2 max-w-md mx-auto">
                        We couldn't find any jobs matching your search.
                        Try changing your search criteria.
                    </p>

                    <a
                        href="{{ route('jobs.browse') }}"
                        class="inline-flex items-center mt-6 px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition"
                    >
                        View All Jobs
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>