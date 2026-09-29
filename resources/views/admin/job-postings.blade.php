<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                Administration
            </p>

            <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
                Manage Job Postings
            </h2>
        </div>
    </x-slot>

    <div class="py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>
                        <h1 class="text-3xl font-extrabold text-gray-900">
                            All Job Postings
                        </h1>

                        <p class="mt-2 text-gray-500">
                            View and manage all jobs posted by recruiters.
                        </p>
                    </div>

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-50 text-indigo-700 font-semibold text-sm w-fit">
                        <span>💼</span>
                        <span>{{ $jobPostings->count() }} Jobs</span>
                    </div>

                </div>

            </div>


            {{-- Job Postings --}}
            @if($jobPostings->count() > 0)

                <div class="space-y-5">

                    @foreach($jobPostings as $job)

                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300 p-6">

                            {{-- Top Section --}}
                            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">

                                <div class="flex items-start gap-4">

                                    {{-- Job Icon --}}
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-2xl shadow-sm flex-shrink-0">
                                        💼
                                    </div>

                                    <div>

                                        <h3 class="text-xl font-bold text-gray-900">
                                            {{ $job->title }}
                                        </h3>

                                        <p class="mt-1 text-sm font-semibold text-indigo-600">
                                            🏢 {{ $job->company->company_name }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.job-postings.destroy', $job->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this job posting?')"
                                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-50 text-red-600 font-semibold text-sm hover:bg-red-100 transition"
                                    >
                                        🗑️ Delete Job
                                    </button>

                                </form>

                            </div>


                            {{-- Job Information --}}
                            <div class="mt-6 grid grid-cols-1 sm:grid-cols-3 gap-3">

                                {{-- Location --}}
                                <div class="rounded-xl bg-gray-50 p-4">

                                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                        Location
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-gray-800">
                                        📍 {{ $job->location }}
                                    </p>

                                </div>


                                {{-- Job Type --}}
                                <div class="rounded-xl bg-gray-50 p-4">

                                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                        Job Type
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-gray-800">
                                        💼 {{ $job->job_type }}
                                    </p>

                                </div>


                                {{-- Salary --}}
                                <div class="rounded-xl bg-gray-50 p-4">

                                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                        Salary
                                    </p>

                                    <p class="mt-1 text-sm font-semibold text-gray-800">
                                        💰 {{ $job->salary ?? 'Not provided' }}
                                    </p>

                                </div>

                            </div>


                            {{-- Description --}}
                            <div class="mt-5">

                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                    Job Description
                                </p>

                                <p class="mt-2 text-sm text-gray-600 leading-6">
                                    {{ \Illuminate\Support\Str::limit($job->description, 250) }}
                                </p>

                            </div>


                            {{-- Footer --}}
                            <div class="mt-6 pt-5 border-t border-gray-100 flex flex-wrap items-center gap-2">

                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                    ✓ Active Posting
                                </span>

                                @if($job->experience)
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 text-blue-700 text-xs font-bold">
                                        🎯 {{ $job->experience }} Experience
                                    </span>
                                @endif

                                @if($job->deadline)
                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-orange-50 text-orange-700 text-xs font-bold">
                                        📅 Deadline: {{ $job->deadline }}
                                    </span>
                                @endif

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- Empty State --}}
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-12 text-center">

                    <div class="w-20 h-20 mx-auto rounded-2xl bg-gray-100 flex items-center justify-center text-4xl">
                        💼
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-gray-900">
                        No Job Postings Found
                    </h3>

                    <p class="mt-2 text-gray-500">
                        There are currently no jobs posted on JobPortal.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>