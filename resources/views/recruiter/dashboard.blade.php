<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Recruiter Portal
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Recruiter Dashboard
            </h2>
        </div>
    </x-slot>

    <div class="min-h-screen bg-gray-50 py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Welcome --}}
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-sm overflow-hidden mb-8">

                <div class="p-8 sm:p-10 text-white">

                    <p class="text-blue-100 text-sm font-semibold uppercase tracking-wide">
                        Welcome back
                    </p>

                    <h1 class="text-3xl sm:text-4xl font-bold mt-2">
                        {{ auth()->user()->name }} 👋
                    </h1>

                    <p class="text-blue-100 mt-3 max-w-2xl">
                        Manage your job postings, review candidates and keep track of your recruitment activities from one place.
                    </p>

                </div>

            </div>


            {{-- Quick Actions --}}
            <div class="mb-8">

                <div class="mb-5">
                    <h2 class="text-xl font-bold text-gray-800">
                        Quick Actions
                    </h2>

                    <p class="text-gray-500 text-sm mt-1">
                        Manage your recruitment activities.
                    </p>
                </div>


                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    {{-- Post Job --}}
                    <a
                        href="{{ route('job-postings.create') }}"
                        class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200"
                    >

                        <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center text-2xl mb-5">
                            ➕
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 group-hover:text-blue-600">
                            Post a Job
                        </h3>

                        <p class="text-sm text-gray-500 mt-2 leading-6">
                            Create a new job posting and start receiving applications.
                        </p>

                        <div class="mt-5 text-blue-600 font-semibold text-sm">
                            Create Job →
                        </div>

                    </a>


                    {{-- Manage Jobs --}}
                    <a
                        href="{{ route('job-postings.index') }}"
                        class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200"
                    >

                        <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center text-2xl mb-5">
                            💼
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 group-hover:text-indigo-600">
                            Manage Jobs
                        </h3>

                        <p class="text-sm text-gray-500 mt-2 leading-6">
                            View, edit and manage your existing job postings.
                        </p>

                        <div class="mt-5 text-indigo-600 font-semibold text-sm">
                            View Job Posts →
                        </div>

                    </a>


                    {{-- Applicants --}}
                    <a
                        href="{{ route('recruiter.applications') }}"
                        class="group bg-white border border-gray-200 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition duration-200"
                    >

                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-2xl mb-5">
                            👥
                        </div>

                        <h3 class="text-lg font-bold text-gray-800 group-hover:text-green-600">
                            View Applicants
                        </h3>

                        <p class="text-sm text-gray-500 mt-2 leading-6">
                            Review candidate applications and update application status.
                        </p>

                        <div class="mt-5 text-green-600 font-semibold text-sm">
                            View Applications →
                        </div>

                    </a>

                </div>

            </div>


            {{-- Lower Sections --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

                {{-- Workflow --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-11 h-11 rounded-xl bg-purple-100 flex items-center justify-center text-xl">
                            📊
                        </div>

                        <div>
                            <h2 class="text-lg font-bold text-gray-800">
                                Recruitment Workflow
                            </h2>

                            <p class="text-sm text-gray-500">
                                Manage your hiring process step by step.
                            </p>
                        </div>

                    </div>


                    <div class="space-y-5">

                        <div class="flex items-start gap-4">

                            <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold shrink-0">
                                1
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800">
                                    Create a Job
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Publish a job with the required skills and details.
                                </p>
                            </div>

                        </div>


                        <div class="flex items-start gap-4">

                            <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold shrink-0">
                                2
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800">
                                    Receive Applications
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Candidates can discover your jobs and submit applications.
                                </p>
                            </div>

                        </div>


                        <div class="flex items-start gap-4">

                            <div class="w-9 h-9 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold shrink-0">
                                3
                            </div>

                            <div>
                                <h3 class="font-semibold text-gray-800">
                                    Review Candidates
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Review applications and update candidate statuses.
                                </p>
                            </div>

                        </div>

                    </div>

                </div>


                {{-- Company --}}
                <div class="bg-white border border-gray-200 rounded-2xl shadow-sm p-6 sm:p-8">

                    <div class="flex items-center gap-3 mb-6">

                        <div class="w-11 h-11 rounded-xl bg-orange-100 flex items-center justify-center text-xl">
                            🏢
                        </div>

                        <div>
                            <h2 class="text-lg font-bold text-gray-800">
                                Company Profile
                            </h2>

                            <p class="text-sm text-gray-500">
                                Keep your company information updated.
                            </p>
                        </div>

                    </div>


                    <div class="bg-gray-50 rounded-xl p-5">

                        <h3 class="font-semibold text-gray-800">
                            Build your company presence
                        </h3>

                        <p class="text-sm text-gray-500 leading-6 mt-2">
                            Add or update your company profile so candidates can learn more about your organization.
                        </p>

                        <a
                            href="{{ route('company.create') }}"
                            class="inline-flex items-center gap-2 mt-5 px-5 py-3 bg-gray-800 hover:bg-gray-900 text-white rounded-xl font-semibold text-sm transition"
                        >
                            🏢 Manage Company Profile
                        </a>

                    </div>

                </div>

            </div>


            {{-- Tip --}}
            <div class="mt-6 bg-blue-50 border border-blue-100 rounded-2xl p-6">

                <div class="flex items-start gap-4">

                    <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center text-xl shrink-0">
                        💡
                    </div>

                    <div>

                        <h3 class="font-bold text-blue-900">
                            Recruitment Tip
                        </h3>

                        <p class="text-sm text-blue-700 mt-1 leading-6">
                            Keep your job descriptions clear and include the required skills, location, job type and salary information to help candidates understand the opportunity.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>