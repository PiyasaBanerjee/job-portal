<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Job Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/30 py-10">

        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome Banner --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 shadow-xl">

                <div class="absolute -right-16 -top-20 w-72 h-72 rounded-full bg-white/10"></div>
                <div class="absolute right-40 -bottom-28 w-64 h-64 rounded-full bg-white/10"></div>

                <div class="relative p-7 sm:p-10">

                    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">

                        <div>

                            <p class="text-blue-100 text-sm font-semibold uppercase tracking-wider">
                                Welcome Back
                            </p>

                            <h1 class="text-3xl sm:text-4xl font-bold text-white mt-2">
                                You're Logged In! 👋
                            </h1>

                            <p class="text-blue-100 mt-3 max-w-xl leading-6">
                                Welcome to your Job Portal dashboard. Manage your career journey, explore opportunities and connect with employers.
                            </p>

                        </div>


                        <div class="w-20 h-20 shrink-0 rounded-3xl bg-white/15 border border-white/20 backdrop-blur-sm flex items-center justify-center text-4xl shadow-lg">
                            🚀
                        </div>

                    </div>

                </div>

            </div>


            {{-- Quick Access --}}
            <div class="mt-8">

                <div class="mb-5">

                    <h2 class="text-2xl font-bold text-gray-900">
                        Quick Access
                    </h2>

                    <p class="text-gray-500 mt-1">
                        Continue working with your Job Portal.
                    </p>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


                    {{-- Browse Jobs --}}
                    <a
                        href="{{ route('jobs.browse') }}"
                        class="group bg-white rounded-3xl border border-gray-200 p-6 shadow-sm hover:shadow-xl hover:border-blue-200 transition duration-300"
                    >

                        <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                            🔍
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mt-5 group-hover:text-blue-600 transition">
                            Browse Jobs
                        </h3>

                        <p class="text-gray-500 text-sm mt-2 leading-6">
                            Explore available job opportunities and find positions that match your skills.
                        </p>

                        <div class="mt-5 text-blue-600 font-semibold text-sm">
                            Explore Jobs →
                        </div>

                    </a>


                    {{-- Candidate Profile --}}
                    <a
                        href="{{ route('candidate.profile') }}"
                        class="group bg-white rounded-3xl border border-gray-200 p-6 shadow-sm hover:shadow-xl hover:border-indigo-200 transition duration-300"
                    >

                        <div class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                            👤
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mt-5 group-hover:text-indigo-600 transition">
                            My Profile
                        </h3>

                        <p class="text-gray-500 text-sm mt-2 leading-6">
                            Keep your skills, education, experience and resume up to date.
                        </p>

                        <div class="mt-5 text-indigo-600 font-semibold text-sm">
                            Update Profile →
                        </div>

                    </a>


                    {{-- Applications --}}
                    <a
                        href="{{ route('candidate.applications') }}"
                        class="group bg-white rounded-3xl border border-gray-200 p-6 shadow-sm hover:shadow-xl hover:border-purple-200 transition duration-300"
                    >

                        <div class="w-14 h-14 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl group-hover:scale-110 transition">
                            📋
                        </div>

                        <h3 class="text-xl font-bold text-gray-900 mt-5 group-hover:text-purple-600 transition">
                            My Applications
                        </h3>

                        <p class="text-gray-500 text-sm mt-2 leading-6">
                            Track the jobs you have applied for and monitor your application status.
                        </p>

                        <div class="mt-5 text-purple-600 font-semibold text-sm">
                            View Applications →
                        </div>

                    </a>

                </div>

            </div>


            {{-- Career Tip --}}
            <div class="mt-8 bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-8">

                <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                    <div class="w-14 h-14 shrink-0 rounded-2xl bg-yellow-100 flex items-center justify-center text-2xl">
                        💡
                    </div>

                    <div>

                        <p class="text-sm font-bold text-yellow-600 uppercase tracking-wide">
                            Career Tip
                        </p>

                        <h3 class="text-xl font-bold text-gray-900 mt-1">
                            Keep your profile updated
                        </h3>

                        <p class="text-gray-500 mt-1 leading-6">
                            A complete profile with relevant skills, experience and a current resume can make it easier for recruiters to understand your background.
                        </p>

                    </div>

                </div>

            </div>


            {{-- Footer Note --}}
            <div class="text-center mt-8">

                <p class="text-sm text-gray-400">
                    Build your profile. Discover opportunities. Grow your career.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>