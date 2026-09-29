<x-app-layout>

    <x-slot name="header">

        <div class="flex items-center justify-between">

            <div>
                <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                    Administration
                </p>

                <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
                    Admin Dashboard
                </h2>
            </div>

            <div class="hidden sm:flex items-center gap-2 px-4 py-2 bg-indigo-50 rounded-xl">
                <span class="text-lg">🛡️</span>
                <span class="text-sm font-semibold text-indigo-700">
                    Administrator
                </span>
            </div>

        </div>

    </x-slot>


    <div class="py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- Welcome Banner -->
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-700 p-8 sm:p-10 text-white shadow-xl mb-8">

                <div class="relative z-10">

                    <p class="text-blue-100 text-sm font-semibold uppercase tracking-wider">
                        Welcome back
                    </p>

                    <h1 class="mt-2 text-3xl sm:text-4xl font-extrabold">
                        {{ auth()->user()->name }} 👋
                    </h1>

                    <p class="mt-3 text-blue-100 max-w-2xl">
                        Manage users, companies, job postings and applications
                        from one central administration panel.
                    </p>

                </div>


                <!-- Decorative Shapes -->
                <div class="absolute -right-10 -top-10 w-48 h-48 bg-white/10 rounded-full"></div>

                <div class="absolute right-20 -bottom-20 w-56 h-56 bg-white/5 rounded-full"></div>

            </div>


            <!-- Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">


                <!-- Users -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

                    <div class="flex items-center justify-between">

                        <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center text-2xl">
                            👥
                        </div>

                        <span class="text-xs font-semibold text-blue-600 bg-blue-50 px-3 py-1 rounded-full">
                            Users
                        </span>

                    </div>

                    <p class="mt-5 text-sm text-gray-500">
                        Total Users
                    </p>

                    <p class="mt-1 text-3xl font-extrabold text-gray-900">
                        {{ $totalUsers }}
                    </p>

                </div>


                <!-- Companies -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

                    <div class="flex items-center justify-between">

                        <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center text-2xl">
                            🏢
                        </div>

                        <span class="text-xs font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-full">
                            Companies
                        </span>

                    </div>

                    <p class="mt-5 text-sm text-gray-500">
                        Total Companies
                    </p>

                    <p class="mt-1 text-3xl font-extrabold text-gray-900">
                        {{ $totalCompanies }}
                    </p>

                </div>


                <!-- Jobs -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

                    <div class="flex items-center justify-between">

                        <div class="w-12 h-12 rounded-xl bg-orange-50 flex items-center justify-center text-2xl">
                            💼
                        </div>

                        <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-full">
                            Jobs
                        </span>

                    </div>

                    <p class="mt-5 text-sm text-gray-500">
                        Total Job Postings
                    </p>

                    <p class="mt-1 text-3xl font-extrabold text-gray-900">
                        {{ $totalJobPostings }}
                    </p>

                </div>


                <!-- Applications -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-lg transition">

                    <div class="flex items-center justify-between">

                        <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center text-2xl">
                            📋
                        </div>

                        <span class="text-xs font-semibold text-purple-600 bg-purple-50 px-3 py-1 rounded-full">
                            Applications
                        </span>

                    </div>

                    <p class="mt-5 text-sm text-gray-500">
                        Total Applications
                    </p>

                    <p class="mt-1 text-3xl font-extrabold text-gray-900">
                        {{ $totalApplications }}
                    </p>

                </div>

            </div>


            <!-- Management Section -->
            <div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-6 sm:p-8">

                <div class="mb-6">

                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider">
                        Administration
                    </p>

                    <h3 class="mt-1 text-2xl font-extrabold text-gray-900">
                        Manage JobPortal
                    </h3>

                    <p class="mt-2 text-gray-500">
                        Access and manage the main areas of your platform.
                    </p>

                </div>


                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">


                    <!-- Manage Users -->
                    <a
                        href="{{ route('admin.users') }}"
                        class="group flex items-center gap-4 p-5 rounded-2xl border border-gray-100 bg-gray-50 hover:bg-blue-50 hover:border-blue-200 transition"
                    >

                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-2xl group-hover:scale-105 transition">
                            👥
                        </div>

                        <div class="flex-1">

                            <h4 class="font-bold text-gray-900">
                                Manage Users
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                View and manage registered users.
                            </p>

                        </div>

                        <span class="text-gray-400 group-hover:text-blue-600 text-xl transition">
                            →
                        </span>

                    </a>


                    <!-- Manage Companies -->
                    <a
                        href="{{ route('admin.companies') }}"
                        class="group flex items-center gap-4 p-5 rounded-2xl border border-gray-100 bg-gray-50 hover:bg-green-50 hover:border-green-200 transition"
                    >

                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl group-hover:scale-105 transition">
                            🏢
                        </div>

                        <div class="flex-1">

                            <h4 class="font-bold text-gray-900">
                                Manage Companies
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                Review and manage company profiles.
                            </p>

                        </div>

                        <span class="text-gray-400 group-hover:text-green-600 text-xl transition">
                            →
                        </span>

                    </a>


                    <!-- Manage Jobs -->
                    <a
                        href="{{ route('admin.job-postings') }}"
                        class="group flex items-center gap-4 p-5 rounded-2xl border border-gray-100 bg-gray-50 hover:bg-orange-50 hover:border-orange-200 transition"
                    >

                        <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center text-2xl group-hover:scale-105 transition">
                            💼
                        </div>

                        <div class="flex-1">

                            <h4 class="font-bold text-gray-900">
                                Manage Job Postings
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                Review and manage available jobs.
                            </p>

                        </div>

                        <span class="text-gray-400 group-hover:text-orange-600 text-xl transition">
                            →
                        </span>

                    </a>


                    <!-- Manage Applications -->
                    <a
                        href="{{ route('admin.applications') }}"
                        class="group flex items-center gap-4 p-5 rounded-2xl border border-gray-100 bg-gray-50 hover:bg-purple-50 hover:border-purple-200 transition"
                    >

                        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center text-2xl group-hover:scale-105 transition">
                            📋
                        </div>

                        <div class="flex-1">

                            <h4 class="font-bold text-gray-900">
                                Manage Applications
                            </h4>

                            <p class="text-sm text-gray-500 mt-1">
                                Review submitted job applications.
                            </p>

                        </div>

                        <span class="text-gray-400 group-hover:text-purple-600 text-xl transition">
                            →
                        </span>

                    </a>

                </div>

            </div>


            <!-- Admin Tip -->
            <div class="mt-6 rounded-2xl bg-indigo-50 border border-indigo-100 p-5">

                <div class="flex items-start gap-3">

                    <div class="text-2xl">
                        💡
                    </div>

                    <div>

                        <h4 class="font-bold text-indigo-900">
                            Admin Tip
                        </h4>

                        <p class="mt-1 text-sm text-indigo-700">
                            Regularly review job postings and applications
                            to keep the JobPortal platform organized.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>