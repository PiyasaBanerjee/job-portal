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


                    <!-- Heading -->
                    <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight">

                        Create a new
                        <span class="text-yellow-300">
                            password.
                        </span>

                    </h2>


                    <p class="mt-6 text-blue-100 leading-7 max-w-md">

                        Set a new secure password for your JobPortal
                        account and get back to your career journey.

                    </p>

                </div>


                <!-- Security Features -->
                <div class="space-y-4 mt-10">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🔐
                        </div>

                        <div>
                            <p class="font-semibold">
                                Secure Account
                            </p>

                            <p class="text-sm text-blue-100">
                                Protect your personal information.
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🚀
                        </div>

                        <div>
                            <p class="font-semibold">
                                Continue Your Journey
                            </p>

                            <p class="text-sm text-blue-100">
                                Access jobs and career opportunities.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Right: Reset Password Form -->
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


                <!-- Icon -->
                <div class="flex justify-center mb-6">

                    <div class="w-20 h-20 rounded-full bg-indigo-50 flex items-center justify-center text-4xl">
                        🔑
                    </div>

                </div>


                <!-- Heading -->
                <div class="text-center mb-8">

                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider">
                        Account Security
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                        Reset your password
                    </h2>

                    <p class="mt-4 text-gray-500 leading-6">
                        Enter your email address and choose a new
                        password for your account.
                    </p>

                </div>


                <!-- Form -->
                <form method="POST" action="{{ route('password.store') }}">

                    @csrf


                    <!-- Reset Password Token -->
                    <input
                        type="hidden"
                        name="token"
                        value="{{ $request->route('token') }}"
                    >


                    <!-- Email -->
                    <div>

                        <x-input-label
                            for="email"
                            :value="__('Email')"
                            class="font-semibold text-gray-700"
                        />

                        <x-text-input
                            id="email"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="email"
                            name="email"
                            :value="old('email', $request->email)"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Enter your email"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Password -->
                    <div class="mt-5">

                        <x-input-label
                            for="password"
                            :value="__('Password')"
                            class="font-semibold text-gray-700"
                        />

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Create a new password"
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Confirm Password -->
                    <div class="mt-5">

                        <x-input-label
                            for="password_confirmation"
                            :value="__('Confirm Password')"
                            class="font-semibold text-gray-700"
                        />

                        <x-text-input
                            id="password_confirmation"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Confirm your new password"
                        />

                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Reset Button -->
                    <div class="mt-7">

                        <button
                            type="submit"
                            class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold shadow-lg hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition duration-200"
                        >
                            {{ __('Reset Password') }}
                        </button>

                    </div>

                </form>


                <!-- Back to Login -->
                <div class="mt-6 text-center">

                    <a
                        href="{{ route('login') }}"
                        class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition"
                    >
                        ← Back to Login
                    </a>

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