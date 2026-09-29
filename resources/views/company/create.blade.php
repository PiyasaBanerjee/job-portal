<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Recruiter Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Company Profile
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/30 py-10">

        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Page Heading --}}
            <div class="mb-8">

                <div class="flex items-center gap-4">

                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-2xl shadow-lg shadow-blue-200">
                        🏢
                    </div>

                    <div>
                        <p class="text-sm font-semibold text-blue-600 uppercase tracking-wide">
                            Company Setup
                        </p>

                        <h1 class="text-3xl font-bold text-gray-900 mt-1">
                            Create Company Profile
                        </h1>

                        <p class="text-gray-500 mt-2">
                            Add your company information to start posting jobs and attracting candidates.
                        </p>
                    </div>

                </div>

            </div>


            {{-- Main Card --}}
            <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden">

                {{-- Card Header --}}
                <div class="relative overflow-hidden bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 px-6 sm:px-8 py-7">

                    <div class="absolute -right-10 -top-16 w-48 h-48 bg-white/10 rounded-full"></div>
                    <div class="absolute right-24 -bottom-20 w-40 h-40 bg-white/10 rounded-full"></div>

                    <div class="relative">

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-white/15 border border-white/20 flex items-center justify-center text-xl">
                                ✨
                            </div>

                            <div>
                                <h2 class="text-xl font-bold text-white">
                                    Company Information
                                </h2>

                                <p class="text-blue-100 text-sm mt-1">
                                    Tell candidates about your organization.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Form --}}
                <div class="p-6 sm:p-8">

                    <form method="POST" action="{{ route('company.store') }}">
                        @csrf


                        {{-- Company Name --}}
                        <div class="mb-6">

                            <label
                                for="company_name"
                                class="block text-sm font-bold text-gray-700 mb-2"
                            >
                                Company Name
                                <span class="text-red-500">*</span>
                            </label>

                            <div class="relative">

                                <span class="absolute left-4 top-1/2 -translate-y-1/2 text-lg">
                                    🏢
                                </span>

                                <input
                                    id="company_name"
                                    type="text"
                                    name="company_name"
                                    value="{{ old('company_name') }}"
                                    placeholder="Enter your company name"
                                    class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    required
                                >

                            </div>

                            @error('company_name')
                                <p class="text-red-600 text-sm mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Description --}}
                        <div class="mb-6">

                            <label
                                for="description"
                                class="block text-sm font-bold text-gray-700 mb-2"
                            >
                                Company Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="6"
                                placeholder="Describe your company, culture, services, and what makes your organization unique..."
                                class="w-full px-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition resize-none"
                            >{{ old('description') }}</textarea>

                            <p class="text-xs text-gray-400 mt-2">
                                A clear description helps candidates understand your organization.
                            </p>

                        </div>


                        {{-- Location + Website --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                            {{-- Location --}}
                            <div>

                                <label
                                    for="location"
                                    class="block text-sm font-bold text-gray-700 mb-2"
                                >
                                    Location
                                </label>

                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-lg">
                                        📍
                                    </span>

                                    <input
                                        id="location"
                                        type="text"
                                        name="location"
                                        value="{{ old('location') }}"
                                        placeholder="e.g. Kolkata, West Bengal"
                                        class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    >

                                </div>

                            </div>


                            {{-- Website --}}
                            <div>

                                <label
                                    for="website"
                                    class="block text-sm font-bold text-gray-700 mb-2"
                                >
                                    Company Website
                                </label>

                                <div class="relative">

                                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-lg">
                                        🌐
                                    </span>

                                    <input
                                        id="website"
                                        type="url"
                                        name="website"
                                        value="{{ old('website') }}"
                                        placeholder="https://example.com"
                                        class="w-full pl-12 pr-4 py-3.5 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"
                                    >

                                </div>

                            </div>

                        </div>


                        {{-- Information Box --}}
                        <div class="mb-8 rounded-2xl bg-blue-50 border border-blue-100 p-5">

                            <div class="flex items-start gap-3">

                                <div class="w-10 h-10 shrink-0 rounded-xl bg-blue-100 flex items-center justify-center">
                                    💡
                                </div>

                                <div>

                                    <h3 class="font-bold text-blue-900">
                                        Recruiter Tip
                                    </h3>

                                    <p class="text-sm text-blue-700 mt-1 leading-6">
                                        Keep your company information clear and professional. A complete profile can help candidates understand your organization before applying.
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Buttons --}}
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-end gap-3">

                            <a
                                href="{{ route('recruiter.dashboard') }}"
                                class="inline-flex items-center justify-center gap-2 px-6 py-3 border border-gray-300 bg-white hover:bg-gray-50 text-gray-700 font-semibold rounded-xl transition"
                            >
                                ← Cancel
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center justify-center gap-2 px-7 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-xl shadow-md shadow-blue-200 transition duration-200 hover:-translate-y-0.5"
                            >
                                🏢 Create Company
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            {{-- Bottom Note --}}
            <div class="mt-6 text-center">

                <p class="text-sm text-gray-400">
                    Your company profile information will be used when publishing job opportunities.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>