<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Recruiter Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Applicants
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Header --}}
            <div class="mb-8">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-3xl">
                        👥
                    </div>

                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">
                            Applicants
                        </h1>

                        <p class="text-gray-500 mt-1">
                            Review candidates and manage their application status.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Success Message --}}
            @if(session('success'))

                <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4 flex items-start gap-3">

                    <div class="w-9 h-9 rounded-lg bg-green-100 flex items-center justify-center text-green-600 text-lg">
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


            {{-- Applicant Count --}}
            <div class="mb-6">

                <div class="inline-flex items-center gap-2 bg-blue-50 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                    👥
                    {{ $applications->count() }}
                    {{ $applications->count() == 1 ? 'Application' : 'Applications' }}
                </div>

            </div>


            @if($applications->count() > 0)

                <div class="space-y-6">

                    @foreach($applications as $application)

                        <div class="bg-white border border-gray-200 rounded-2xl shadow-sm hover:shadow-md transition overflow-hidden">

                            {{-- Applicant Header --}}
                            <div class="p-6">

                                <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">

                                    <div class="flex items-start gap-4">

                                        {{-- Candidate Avatar --}}
                                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center text-white text-xl font-bold shrink-0">
                                            {{ strtoupper(substr($application->candidate->name, 0, 1)) }}
                                        </div>


                                        <div>

                                            <h2 class="text-xl font-bold text-gray-900">
                                                {{ $application->candidate->name }}
                                            </h2>

                                            <p class="text-gray-500 text-sm mt-1">
                                                {{ $application->candidate->email }}
                                            </p>

                                        </div>

                                    </div>


                                    {{-- Current Status --}}
                                    @php
                                        $statusClasses = [
                                            'Applied' => 'bg-blue-100 text-blue-700',
                                            'Shortlisted' => 'bg-yellow-100 text-yellow-700',
                                            'Rejected' => 'bg-red-100 text-red-700',
                                            'Hired' => 'bg-green-100 text-green-700',
                                        ];

                                        $statusClass = $statusClasses[$application->status] ?? 'bg-gray-100 text-gray-700';
                                    @endphp

                                    <span class="inline-flex items-center justify-center px-4 py-2 rounded-full text-sm font-semibold {{ $statusClass }}">
                                        {{ $application->status }}
                                    </span>

                                </div>


                                {{-- Job Information --}}
                                <div class="mt-6 bg-gray-50 rounded-xl p-4">

                                    <div class="flex items-center gap-3">

                                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-xl">
                                            💼
                                        </div>

                                        <div>

                                            <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                                Applied For
                                            </p>

                                            <p class="font-bold text-gray-800 mt-1">
                                                {{ $application->jobPosting->title }}
                                            </p>

                                        </div>

                                    </div>

                                </div>


                                {{-- Application Details --}}
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-5">

                                    <div class="border border-gray-100 rounded-xl p-4">

                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                            Candidate Email
                                        </p>

                                        <p class="text-gray-800 font-medium mt-1 break-all">
                                            {{ $application->candidate->email }}
                                        </p>

                                    </div>


                                    <div class="border border-gray-100 rounded-xl p-4">

                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-semibold">
                                            Applied On
                                        </p>

                                        <p class="text-gray-800 font-medium mt-1">
                                            {{ $application->created_at->format('d M Y') }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Cover Letter --}}
                                @if($application->cover_letter)

                                    <div class="mt-5">

                                        <div class="flex items-center gap-2 mb-2">

                                            <span class="text-lg">
                                                📝
                                            </span>

                                            <h3 class="text-sm font-semibold text-gray-700">
                                                Cover Letter
                                            </h3>

                                        </div>

                                        <div class="bg-blue-50 border border-blue-100 rounded-xl p-5">

                                            <p class="text-gray-700 text-sm leading-6 whitespace-pre-line">
                                                {{ $application->cover_letter }}
                                            </p>

                                        </div>

                                    </div>

                                @endif

                            </div>


                            {{-- Status Update Footer --}}
                            <div class="border-t border-gray-100 bg-gray-50 px-6 py-5">

                                <form
                                    method="POST"
                                    action="{{ route('recruiter.applications.status', $application->id) }}"
                                >

                                    @csrf
                                    @method('PUT')

                                    <div class="flex flex-col md:flex-row md:items-end gap-4">

                                        <div class="flex-1">

                                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                                Update Application Status
                                            </label>

                                            <select
                                                name="status"
                                                class="w-full rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 px-4 py-3"
                                            >

                                                <option value="Applied"
                                                    {{ $application->status == 'Applied' ? 'selected' : '' }}>
                                                    Applied
                                                </option>

                                                <option value="Shortlisted"
                                                    {{ $application->status == 'Shortlisted' ? 'selected' : '' }}>
                                                    Shortlisted
                                                </option>

                                                <option value="Rejected"
                                                    {{ $application->status == 'Rejected' ? 'selected' : '' }}>
                                                    Rejected
                                                </option>

                                                <option value="Hired"
                                                    {{ $application->status == 'Hired' ? 'selected' : '' }}>
                                                    Hired
                                                </option>

                                            </select>

                                        </div>


                                        <button
                                            type="submit"
                                            class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl shadow-sm transition"
                                        >
                                            ✓ Update Status
                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                {{-- Empty State --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm text-center py-16 px-6">

                    <div class="w-20 h-20 mx-auto rounded-2xl bg-blue-100 flex items-center justify-center text-4xl mb-6">
                        👥
                    </div>

                    <h2 class="text-2xl font-bold text-gray-800">
                        No Applications Yet
                    </h2>

                    <p class="text-gray-500 mt-2 max-w-md mx-auto">
                        You haven't received any applications yet. Once candidates apply for your jobs,
                        their applications will appear here.
                    </p>

                    <a
                        href="{{ route('job-postings.index') }}"
                        class="inline-flex items-center gap-2 mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-xl transition"
                    >
                        💼 View My Jobs
                    </a>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>