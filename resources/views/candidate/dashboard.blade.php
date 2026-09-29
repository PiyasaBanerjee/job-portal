<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Candidate Dashboard
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Manage your career and job applications
                </p>
            </div>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Welcome Section -->

            <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 p-8 shadow-lg mb-8">

                <div class="relative z-10">

                    <p class="text-blue-100 text-sm font-medium mb-2">
                        Welcome back 👋
                    </p>

                    <h1 class="text-3xl md:text-4xl font-bold text-white">
                        {{ auth()->user()->name }}
                    </h1>

                    <p class="mt-3 text-blue-100 max-w-2xl">
                        Find new opportunities, manage your applications,
                        and build your professional profile.
                    </p>

                </div>

                <!-- Decorative circles -->

                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
                <div class="absolute -right-20 bottom-0 w-56 h-56 bg-white/5 rounded-full"></div>

            </div>


            <!-- Quick Actions -->

            <div class="mb-8">

                <h2 class="text-xl font-bold text-gray-800 mb-5">
                    Quick Actions
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                    <!-- Browse Jobs -->

                    <a
                        href="{{ route('jobs.browse') }}"
                        class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300"
                    >

                        <div class="flex items-center justify-between mb-5">

                            <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-2xl">
                                💼
                            </div>

                            <span class="text-gray-300 group-hover:text-blue-600 transition text-xl">
                                →
                            </span>

                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            Browse Jobs
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Explore available job opportunities and
                            find positions that match your skills.
                        </p>

                    </a>


                    <!-- Applications -->

                    <a
                        href="{{ route('candidate.applications') }}"
                        class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300"
                    >

                        <div class="flex items-center justify-between mb-5">

                            <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl">
                                📋
                            </div>

                            <span class="text-gray-300 group-hover:text-green-600 transition text-xl">
                                →
                            </span>

                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            My Applications
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            View the jobs you have applied for and
                            track your application status.
                        </p>

                    </a>


                    <!-- Profile -->

                    <a
                        href="{{ route('candidate.profile') }}"
                        class="group bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-xl hover:-translate-y-1 transition duration-300"
                    >

                        <div class="flex items-center justify-between mb-5">

                            <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-2xl">
                                👤
                            </div>

                            <span class="text-gray-300 group-hover:text-purple-600 transition text-xl">
                                →
                            </span>

                        </div>

                        <h3 class="text-lg font-bold text-gray-800 mb-2">
                            My Profile
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed">
                            Keep your professional information and
                            resume updated.
                        </p>

                    </a>

                </div>

            </div>


            <!-- Career Section -->

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                <!-- Main Career Card -->

                <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-gray-100 p-8">

                    <div class="flex items-start gap-5">

                        <div class="w-14 h-14 rounded-xl bg-blue-50 flex items-center justify-center text-2xl">
                            🚀
                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-gray-800">
                                Take the next step in your career
                            </h2>

                            <p class="mt-2 text-gray-500 leading-relaxed">
                                Keep your profile updated, explore new jobs,
                                and apply to opportunities that match your
                                career goals.
                            </p>

                        </div>

                    </div>


                    <div class="mt-7 flex flex-wrap gap-3">

                        <a
                            href="{{ route('jobs.browse') }}"
                            class="inline-flex items-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition"
                        >
                            Explore Jobs
                            <span class="ml-2">→</span>
                        </a>

                        <a
                            href="{{ route('candidate.profile') }}"
                            class="inline-flex items-center px-5 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-lg font-semibold transition"
                        >
                            Update Profile
                        </a>

                    </div>

                </div>


                <!-- Profile Reminder -->

                <div class="bg-gradient-to-br from-indigo-50 to-blue-50 rounded-2xl border border-blue-100 p-7">

                    <div class="w-12 h-12 rounded-xl bg-white flex items-center justify-center text-2xl shadow-sm mb-5">
                        📄
                    </div>

                    <h3 class="text-lg font-bold text-gray-800">
                        Keep your profile ready
                    </h3>

                    <p class="text-sm text-gray-600 mt-2 leading-relaxed">
                        Make sure your profile information and resume
                        are updated before applying for new opportunities.
                    </p>

                    <a
                        href="{{ route('candidate.profile') }}"
                        class="inline-block mt-5 text-sm font-bold text-blue-600 hover:text-blue-800"
                    >
                        View Profile →
                    </a>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>