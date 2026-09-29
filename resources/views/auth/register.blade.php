<x-guest-layout>

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="grid md:grid-cols-2">

            <!-- Left: Branding -->
            <div class="hidden md:flex bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 p-10 lg:p-12 text-white flex-col justify-between">

                <div>

                    <!-- Logo -->
                    <div class="flex items-center gap-3 mb-10">

                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-2xl">
                            💼
                        </div>

                        <div>
                            <h1 class="text-2xl font-bold">
                                JobPortal
                            </h1>

                            <p class="text-blue-100 text-sm">
                                Career starts here
                            </p>
                        </div>

                    </div>


                    <!-- Main Text -->
                    <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight">

                        Build your
                        <span class="text-yellow-300">
                            career.
                        </span>

                        <br>

                        Find your
                        <span class="text-yellow-300">
                            opportunity.
                        </span>

                    </h2>

                    <p class="mt-6 text-blue-100 leading-7 max-w-md">

                        Join our job portal and connect with opportunities,
                        talented professionals and growing companies.

                    </p>

                </div>


                <!-- Benefits -->
                <div class="space-y-4 mt-10">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🔎
                        </div>

                        <div>
                            <p class="font-semibold">
                                Discover Opportunities
                            </p>

                            <p class="text-sm text-blue-100">
                                Explore jobs matching your skills.
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🚀
                        </div>

                        <div>
                            <p class="font-semibold">
                                Grow Your Career
                            </p>

                            <p class="text-sm text-blue-100">
                                Take the next step professionally.
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🤝
                        </div>

                        <div>
                            <p class="font-semibold">
                                Connect With Companies
                            </p>

                            <p class="text-sm text-blue-100">
                                Find employers and opportunities.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Right: Register Form -->
            <div class="p-8 sm:p-10 lg:p-12">

                <!-- Mobile Logo -->
                <div class="md:hidden text-center mb-8">

                    <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 text-white text-2xl shadow-lg">
                        💼
                    </div>

                    <h1 class="mt-3 text-2xl font-bold text-gray-900">
                        JobPortal
                    </h1>

                    <p class="text-sm text-gray-500">
                        Career starts here
                    </p>

                </div>


                <!-- Heading -->
                <div class="mb-8">

                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider">
                        Get started
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                        Create your account
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Join JobPortal and start your career journey.
                    </p>

                </div>


                <form method="POST" action="{{ route('register') }}" class="space-y-5">

                    @csrf


                    <!-- Name -->
                    <div>

                        <x-input-label
                            for="name"
                            :value="__('Full Name')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="name"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Enter your full name"
                        />

                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Email -->
                    <div>

                        <x-input-label
                            for="email"
                            :value="__('Email Address')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="Enter your email"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Role -->
                    <div>

                        <x-input-label
                            for="role"
                            :value="__('Register As')"
                            class="text-gray-700 font-semibold"
                        />

                        <select
                            id="role"
                            name="role"
                            class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            required
                        >

                            <option value="">
                                Select your role
                            </option>

                            <option
                                value="candidate"
                                {{ old('role') == 'candidate' ? 'selected' : '' }}
                            >
                                Candidate
                            </option>

                            <option
                                value="recruiter"
                                {{ old('role') == 'recruiter' ? 'selected' : '' }}
                            >
                                Recruiter
                            </option>

                        </select>

                        <p class="mt-2 text-xs text-gray-500">
                            Choose Candidate if you are looking for jobs,
                            or Recruiter if you are hiring.
                        </p>

                        <x-input-error
                            :messages="$errors->get('role')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Password -->
                    <div>

                        <x-input-label
                            for="password"
                            :value="__('Password')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a password"
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Confirm Password -->
                    <div>

                        <x-input-label
                            for="password_confirmation"
                            :value="__('Confirm Password')"
                            class="text-gray-700 font-semibold"
                        />

                        <x-text-input
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your password"
                        />

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Register Button -->
                    <button
                        type="submit"
                        class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold shadow-lg hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition duration-200"
                    >
                        {{ __('Create Account') }}
                    </button>

                </form>


                <!-- Login Link -->
                <div class="mt-8 text-center">

                    <p class="text-sm text-gray-500">

                        Already have an account?

                        <a
                            href="{{ route('login') }}"
                            class="font-bold text-indigo-600 hover:text-indigo-800"
                        >
                            Sign in
                        </a>

                    </p>

                </div>


                <!-- Footer -->
                <div class="mt-8 pt-6 border-t border-gray-100 text-center">

                    <p class="text-xs text-gray-400">
                        © {{ date('Y') }} JobPortal. All rights reserved.
                    </p>

                </div>

            </div>

        </div>

    </div>

</x-guest-layout>