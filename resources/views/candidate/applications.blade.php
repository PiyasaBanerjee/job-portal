<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Career Activity
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                My Applications
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/30 py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-8">

                <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="p-6 sm:p-8">

                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">

                            <div class="flex items-start gap-4">

                                <div class="w-14 h-14 shrink-0 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-2xl shadow-lg shadow-blue-200">
                                    📋
                                </div>

                                <div>
                                    <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                                        Career Activity
                                    </p>

                                    <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-1">
                                        My Applications
                                    </h1>

                                    <p class="text-gray-500 mt-2 max-w-xl">
                                        Track the jobs you have applied for and monitor your application progress.
                                    </p>
                                </div>

                            </div>


                            <a
                                href="{{ route('jobs.browse') }}"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md shadow-blue-200 transition duration-200 hover:-translate-y-0.5"
                            >
                                🔍 Browse Jobs
                            </a>

                        </div>

                    </div>

                </div>

            </div>


            @if($applications->count() > 0)

                {{-- Application Count --}}
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">

                    <div>
                        <h2 class="text-xl font-bold text-gray-900">
                            Application History
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Here is a summary of your submitted applications.
                        </p>
                    </div>


                    <div class="inline-flex items-center gap-2 px-4 py-2.5 bg-blue-100 text-blue-700 rounded-full text-sm font-bold">
                        📋
                        {{ $applications->count() }}
                        {{ $applications->count() == 1 ? 'Application' : 'Applications' }}
                    </div>

                </div>


                {{-- Applications --}}
                <div class="space-y-5">

                    @foreach($applications as $application)

                        @php
                            $status = strtolower($application->status);
                        @endphp

                        <div class="group bg-white border border-gray-200 rounded-3xl shadow-sm hover:shadow-xl hover:border-blue-200 transition duration-300 overflow-hidden">

                            {{-- Top Accent --}}
                            <div class="h-1.5 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600"></div>


                            <div class="p-6 sm:p-7">

                                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-6">

                                    {{-- Job Information --}}
                                    <div class="flex items-start gap-4">

                                        {{-- Company / Job Icon --}}
                                        <div class="w-16 h-16 shrink-0 rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 border border-blue-100 flex items-center justify-center text-3xl group-hover:scale-105 transition duration-300">
                                            💼
                                        </div>


                                        <div class="min-w-0">

                                            <h2 class="text-xl sm:text-2xl font-bold text-gray-900 group-hover:text-blue-700 transition">
                                                {{ $application->jobPosting->title }}
                                            </h2>

                                            <p class="text-gray-700 font-semibold mt-2">
                                                🏢 {{ $application->jobPosting->company->company_name }}
                                            </p>

                                            <div class="flex flex-wrap items-center gap-3 mt-3">

                                                <span class="inline-flex items-center gap-1.5 text-sm text-gray-500">
                                                    📍 {{ $application->jobPosting->location }}
                                                </span>

                                            </div>

                                        </div>

                                    </div>


                                    {{-- Status --}}
                                    <div class="lg:text-right">

                                        @if($status === 'applied')

                                            <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-blue-50 border border-blue-100 text-blue-700 text-sm font-bold">
                                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                                Applied
                                            </span>

                                        @elseif($status === 'shortlisted')

                                            <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-yellow-50 border border-yellow-100 text-yellow-700 text-sm font-bold">
                                                ⭐ Shortlisted
                                            </span>

                                        @elseif($status === 'hired')

                                            <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-green-50 border border-green-100 text-green-700 text-sm font-bold">
                                                ✅ Hired
                                            </span>

                                        @elseif($status === 'rejected')

                                            <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-red-50 border border-red-100 text-red-700 text-sm font-bold">
                                                ❌ Rejected
                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-2 px-4 py-2.5 rounded-full bg-gray-100 border border-gray-200 text-gray-700 text-sm font-bold">
                                                {{ $application->status }}
                                            </span>

                                        @endif

                                        <p class="text-xs text-gray-400 mt-2">
                                            Current Status
                                        </p>

                                    </div>

                                </div>


                                {{-- Application Details --}}
                                <div class="mt-7 pt-6 border-t border-gray-100">

                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

                                        {{-- Applied Date --}}
                                        <div class="rounded-2xl bg-gray-50 border border-gray-100 p-4 hover:bg-blue-50/50 transition">

                                            <div class="flex items-center gap-3">

                                                <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">
                                                    📅
                                                </div>

                                                <div>
                                                    <p class="text-xs uppercase tracking-wide text-gray-400 font-bold">
                                                        Applied On
                                                    </p>

                                                    <p class="text-gray-800 font-semibold mt-1">
                                                        {{ $application->created_at->format('d M Y') }}
                                                    </p>
                                                </div>

                                            </div>

                                        </div>


                                        {{-- Location --}}
                                        <div class="rounded-2xl bg-gray-50 border border-gray-100 p-4 hover:bg-indigo-50/50 transition">

                                            <div class="flex items-center gap-3">

                                                <div class="w-10 h-10 rounded-xl bg-indigo-100 flex items-center justify-center">
                                                    📍
                                                </div>

                                                <div class="min-w-0">
                                                    <p class="text-xs uppercase tracking-wide text-gray-400 font-bold">
                                                        Location
                                                    </p>

                                                    <p class="text-gray-800 font-semibold mt-1 truncate">
                                                        {{ $application->jobPosting->location }}
                                                    </p>
                                                </div>

                                            </div>

                                        </div>


                                        {{-- Application Status --}}
                                        <div class="rounded-2xl bg-gray-50 border border-gray-100 p-4 hover:bg-purple-50/50 transition">

                                            <div class="flex items-center gap-3">

                                                <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center">
                                                    📊
                                                </div>

                                                <div>
                                                    <p class="text-xs uppercase tracking-wide text-gray-400 font-bold">
                                                        Status
                                                    </p>

                                                    <p class="text-gray-800 font-semibold mt-1 capitalize">
                                                        {{ $application->status }}
                                                    </p>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


                                {{-- Bottom Action --}}
                                <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                    <p class="text-sm text-gray-500">
                                        Keep checking your application status for recruiter updates.
                                    </p>

                                    <a
                                        href="{{ route('jobs.show', $application->jobPosting->id) }}"
                                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 border border-gray-200 bg-white hover:bg-blue-50 hover:border-blue-200 text-gray-700 hover:text-blue-700 font-semibold rounded-xl transition"
                                    >
                                        View Job
                                        <span>→</span>
                                    </a>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- Empty State --}}
                <div class="bg-white border border-gray-200 rounded-3xl shadow-sm overflow-hidden">

                    <div class="p-10 sm:p-16 text-center">

                        <div class="relative w-24 h-24 mx-auto">

                            <div class="absolute inset-0 rounded-full bg-blue-100 animate-pulse"></div>

                            <div class="relative w-24 h-24 rounded-full bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center text-5xl">
                                📋
                            </div>

                        </div>


                        <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-7">
                            No Applications Yet
                        </h2>

                        <p class="text-gray-500 max-w-lg mx-auto mt-3 leading-7">
                            You haven't applied for any jobs yet. Explore available opportunities and submit your first application to start your career journey.
                        </p>


                        <a
                            href="{{ route('jobs.browse') }}"
                            class="inline-flex items-center gap-2 mt-7 px-7 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md shadow-blue-200 transition duration-200 hover:-translate-y-0.5"
                        >
                            🔍 Browse Available Jobs
                        </a>

                    </div>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>