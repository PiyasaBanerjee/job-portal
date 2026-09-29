<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Recruiter Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                My Job Postings
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 mb-8">

                <div>
                    <h1 class="text-3xl font-bold text-gray-900">
                        My Job Postings
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Manage the jobs you have published and track your opportunities.
                    </p>
                </div>

                <a
                    href="{{ route('job-postings.create') }}"
                    class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-sm transition"
                >
                    <span class="text-lg">+</span>
                    Post New Job
                </a>

            </div>


            {{-- Job Count --}}
            <div class="mb-6">

                <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                    💼
                    {{ $jobPostings->count() }}
                    {{ $jobPostings->count() == 1 ? 'Job Posting' : 'Job Postings' }}
                </div>

            </div>


            @if($jobPostings->count() > 0)

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                    @foreach($jobPostings as $job)

                        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden">

                            {{-- Card Top --}}
                            <div class="p-6">

                                <div class="flex items-start justify-between gap-4">

                                    <div class="flex items-start gap-4">

                                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-2xl shrink-0">
                                            💼
                                        </div>

                                        <div>
                                            <h2 class="text-xl font-bold text-gray-900">
                                                {{ $job->title }}
                                            </h2>

                                            <p class="text-sm text-gray-500 mt-1">
                                                Job Opportunity
                                            </p>
                                        </div>

                                    </div>

                                </div>


                                {{-- Job Information --}}
                                <div class="flex flex-wrap gap-2 mt-6">

                                    <span class="inline-flex items-center gap-1.5 bg-blue-50 text-blue-700 px-3 py-1.5 rounded-full text-sm font-medium">
                                        📍 {{ $job->location }}
                                    </span>

                                    <span class="inline-flex items-center gap-1.5 bg-green-50 text-green-700 px-3 py-1.5 rounded-full text-sm font-medium">
                                        🕒 {{ $job->job_type }}
                                    </span>

                                    @if($job->salary)
                                        <span class="inline-flex items-center gap-1.5 bg-purple-50 text-purple-700 px-3 py-1.5 rounded-full text-sm font-medium">
                                            💰 {{ $job->salary }}
                                        </span>
                                    @endif

                                </div>


                                {{-- Description --}}
                                <div class="mt-6">

                                    <h3 class="text-sm font-semibold text-gray-700 mb-2">
                                        Job Description
                                    </h3>

                                    <p class="text-gray-600 text-sm leading-6">
                                        {{ $job->description }}
                                    </p>

                                </div>

                            </div>


                            {{-- Card Footer --}}
                            <div class="border-t border-gray-100 bg-gray-50 px-6 py-4">

                                <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">

                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('job-postings.edit', $job->id) }}"
                                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white rounded-lg font-semibold text-sm transition"
                                    >
                                        ✏️ Edit Job
                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        method="POST"
                                        action="{{ route('job-postings.destroy', $job->id) }}"
                                        onsubmit="return confirm('Are you sure you want to delete this job posting?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="w-full inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-lg font-semibold text-sm transition"
                                        >
                                            🗑️ Delete Job
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- Empty State --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm text-center py-16 px-6">

                    <div class="w-20 h-20 mx-auto rounded-2xl bg-blue-100 flex items-center justify-center text-4xl mb-6">
                        💼
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        No Job Postings Yet
                    </h2>

                    <p class="text-gray-500 mt-2 max-w-md mx-auto">
                        You haven't published any jobs yet. Create your first job posting to start receiving applications.
                    </p>

                    <a
                        href="{{ route('job-postings.create') }}"
                        class="inline-flex items-center gap-2 mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition"
                    >
                        + Post Your First Job
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>