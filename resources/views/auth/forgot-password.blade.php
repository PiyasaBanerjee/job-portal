<x-guest-layout>

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="grid md:grid-cols-2">

            <!-- Left: Branding -->
            <div class="hidden md:flex bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 p-10 lg:p-12 text-white flex-col justify-between">

                <div>

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

                    <h2 class="text-4xl lg:text-5xl font-extrabold leading-tight">
                        Get back to your
                        <span class="text-yellow-300">
                            account.
                        </span>
                    </h2>

                    <p class="mt-6 text-blue-100 leading-7 max-w-md">
                        Don't worry if you forgot your password.
                        We'll help you securely reset it and get back
                        to your job search.
                    </p>

                </div>


                <div class="space-y-4 mt-10">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🔐
                        </div>

                        <div>
                            <p class="font-semibold">
                                Secure Password Reset
                            </p>

                            <p class="text-sm text-blue-100">
                                Reset your password securely.
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            📧
                        </div>

                        <div>
                            <p class="font-semibold">
                                Check Your Email
                            </p>

                            <p class="text-sm text-blue-100">
                                We'll send you a reset link.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Right: Forgot Password -->
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
                        Password Recovery
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                        Forgot your password?
                    </h2>

                    <p class="mt-3 text-gray-500 leading-6">
                        Enter the email address associated with your
                        account and we'll send you a password reset link.
                    </p>

                </div>


                <!-- Session Status -->
                <x-auth-session-status
                    class="mb-5"
                    :status="session('status')"
                />


                <!-- Form -->
                <form
                    method="POST"
                    action="{{ route('password.email') }}"
                    class="space-y-6"
                >

                    @csrf


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
                            autofocus
                            placeholder="Enter your email address"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Reset Button -->
                    <button
                        type="submit"
                        class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold shadow-lg hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition duration-200"
                    >
                        {{ __('Send Password Reset Link') }}
                    </button>

                </form>


                <!-- Back to Login -->
                <div class="mt-8 text-center">

                    <a
                        href="{{ route('login') }}"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:text-indigo-800"
                    >
                        ← Back to Sign In
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