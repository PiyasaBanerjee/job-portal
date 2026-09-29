<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                Administration
            </p>

            <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
                Manage Applications
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
                            All Applications
                        </h1>

                        <p class="mt-2 text-gray-500">
                            View and manage applications submitted by candidates.
                        </p>
                    </div>

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-50 text-indigo-700 font-semibold text-sm w-fit">
                        <span>📄</span>
                        <span>{{ $applications->count() }} Applications</span>
                    </div>

                </div>

            </div>


            {{-- Applications --}}
            @if($applications->count() > 0)

                <div class="space-y-5">

                    @foreach($applications as $application)

                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300 p-6">

                            {{-- Top Section --}}
                            <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-5">

                                <div class="flex items-start gap-4">

                                    {{-- Candidate Icon --}}
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-xl font-bold shadow-sm flex-shrink-0">
                                        {{ strtoupper(substr($application->candidate->name, 0, 1)) }}
                                    </div>

                                    <div>

                                        <h3 class="text-xl font-bold text-gray-900">
                                            {{ $application->candidate->name }}
                                        </h3>

                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ $application->candidate->email }}
                                        </p>

                                    </div>

                                </div>


                                {{-- Status --}}
                                @php
                                    $status = strtolower($application->status);
                                @endphp

                                @if($status === 'hired')

                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-50 text-green-700 text-xs font-bold w-fit">
                                        ✓ Hired
                                    </span>

                                @elseif($status === 'shortlisted')

                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-blue-50 text-blue-700 text-xs font-bold w-fit">
                                        ⭐ Shortlisted
                                    </span>

                                @elseif($status === 'rejected')

                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-red-50 text-red-700 text-xs font-bold w-fit">
                                        ✕ Rejected
                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-yellow-50 text-yellow-700 text-xs font-bold w-fit">
                                        ⏳ {{ ucfirst($application->status) }}
                                    </span>

                                @endif

                            </div>


                            {{-- Job Information --}}
                            <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-4">

                                {{-- Job --}}
                                <div class="rounded-xl bg-gray-50 p-4">

                                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                        Applied For
                                    </p>

                                    <p class="mt-1 text-sm font-bold text-gray-800">
                                        💼 {{ $application->jobPosting->title }}
                                    </p>

                                </div>


                                {{-- Company --}}
                                <div class="rounded-xl bg-gray-50 p-4">

                                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                        Company
                                    </p>

                                    <p class="mt-1 text-sm font-bold text-gray-800">
                                        🏢 {{ $application->jobPosting->company->company_name }}
                                    </p>

                                </div>

                            </div>


                            {{-- Application Date --}}
                            <div class="mt-4 flex items-center gap-3">

                                <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center">
                                    📅
                                </div>

                                <div>

                                    <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                        Applied Date
                                    </p>

                                    <p class="text-sm font-semibold text-gray-700">
                                        {{ $application->created_at->format('d M Y') }}
                                    </p>

                                </div>

                            </div>


                            {{-- Cover Letter --}}
                            <div class="mt-5 rounded-xl bg-gray-50 p-5">

                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                    Cover Letter
                                </p>

                                <p class="mt-2 text-sm text-gray-600 leading-6">
                                    {{ $application->cover_letter ?? 'Not provided' }}
                                </p>

                            </div>


                            {{-- Footer --}}
                            <div class="mt-6 pt-5 border-t border-gray-100 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                <div class="text-sm text-gray-400">
                                    Application #{{ $application->id }}
                                </div>

                                <form
                                    action="{{ route('admin.applications.destroy', $application->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this application?')"
                                        class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-50 text-red-600 font-semibold text-sm hover:bg-red-100 transition"
                                    >
                                        🗑️ Delete Application
                                    </button>

                                </form>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- Empty State --}}
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-12 text-center">

                    <div class="w-20 h-20 mx-auto rounded-2xl bg-gray-100 flex items-center justify-center text-4xl">
                        📄
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-gray-900">
                        No Applications Found
                    </h3>

                    <p class="mt-2 text-gray-500">
                        There are currently no job applications on JobPortal.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>