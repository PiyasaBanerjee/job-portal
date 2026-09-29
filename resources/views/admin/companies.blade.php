<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                Administration
            </p>

            <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
                Manage Companies
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
                            All Companies
                        </h1>

                        <p class="mt-2 text-gray-500">
                            View and manage all companies registered on JobPortal.
                        </p>
                    </div>

                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-50 text-indigo-700 font-semibold text-sm w-fit">
                        <span>🏢</span>
                        <span>{{ $companies->count() }} Companies</span>
                    </div>

                </div>

            </div>


            {{-- Companies --}}
            @if($companies->count() > 0)

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    @foreach($companies as $company)

                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-lg transition duration-300 p-6">

                            {{-- Top Section --}}
                            <div class="flex items-start justify-between gap-4">

                                <div class="flex items-center gap-4">

                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-2xl shadow-sm">
                                        🏢
                                    </div>

                                    <div>
                                        <h3 class="text-xl font-bold text-gray-900">
                                            {{ $company->company_name }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1">
                                            Company Profile
                                        </p>
                                    </div>

                                </div>

                                {{-- Delete --}}
                                <form
                                    action="{{ route('admin.companies.destroy', $company->id) }}"
                                    method="POST"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Are you sure you want to delete this company?')"
                                        class="inline-flex items-center gap-2 px-3 py-2 rounded-xl bg-red-50 text-red-600 font-semibold text-xs hover:bg-red-100 transition"
                                    >
                                        🗑️ Delete
                                    </button>

                                </form>

                            </div>


                            {{-- Company Details --}}
                            <div class="mt-6 space-y-3">

                                {{-- Location --}}
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                                        📍
                                    </div>

                                    <div>
                                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                            Location
                                        </p>

                                        <p class="text-sm font-medium text-gray-700">
                                            {{ $company->location ?? 'Not provided' }}
                                        </p>
                                    </div>

                                </div>


                                {{-- Website --}}
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-indigo-50 flex items-center justify-center">
                                        🌐
                                    </div>

                                    <div class="min-w-0">

                                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                            Website
                                        </p>

                                        @if($company->website)

                                            <a
                                                href="{{ $company->website }}"
                                                target="_blank"
                                                class="text-sm font-medium text-indigo-600 hover:text-indigo-800 break-all"
                                            >
                                                {{ $company->website }}
                                            </a>

                                        @else

                                            <p class="text-sm font-medium text-gray-700">
                                                Not provided
                                            </p>

                                        @endif

                                    </div>

                                </div>


                                {{-- Recruiter --}}
                                <div class="flex items-center gap-3">

                                    <div class="w-10 h-10 rounded-xl bg-green-50 flex items-center justify-center">
                                        👤
                                    </div>

                                    <div>

                                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide">
                                            Recruiter
                                        </p>

                                        <p class="text-sm font-semibold text-gray-700">
                                            {{ $company->user->name }}
                                        </p>

                                    </div>

                                </div>

                            </div>


                            {{-- Bottom Badge --}}
                            <div class="mt-6 pt-5 border-t border-gray-100">

                                <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                    ✓ Registered Company
                                </span>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- Empty State --}}
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-12 text-center">

                    <div class="w-20 h-20 mx-auto rounded-2xl bg-gray-100 flex items-center justify-center text-4xl">
                        🏢
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-gray-900">
                        No Companies Found
                    </h3>

                    <p class="mt-2 text-gray-500">
                        There are currently no registered companies on JobPortal.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>