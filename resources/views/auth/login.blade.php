<x-guest-layout>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-100 flex items-center justify-center px-4 py-10">

        <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl overflow-hidden grid md:grid-cols-2">

            <!-- Left: Branding -->
            <div class="hidden md:flex bg-gradient-to-br from-blue-600 via-indigo-600 to-purple-700 p-10 text-white flex-col justify-between">

                <div>
                    <div class="flex items-center gap-3 mb-10">
                        <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center text-2xl">
                            💼
                        </div>

                        <div>
                            <h1 class="text-2xl font-bold">JobPortal</h1>
                            <p class="text-blue-100 text-sm">Career starts here</p>
                        </div>
                    </div>

                    <h2 class="text-4xl font-extrabold leading-tight">
                        Find your next
                        <span class="text-yellow-300">career opportunity.</span>
                    </h2>

                    <p class="mt-5 text-blue-100 leading-7">
                        Connect with companies, discover opportunities,
                        and take the next step in your professional journey.
                    </p>
                </div>

                <div class="space-y-4">

                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                            ✓
                        </div>
                        <span class="text-sm">Discover relevant jobs</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                            ✓
                        </div>
                        <span class="text-sm">Apply with your profile</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-white/15 flex items-center justify-center">
                            ✓
                        </div>
                        <span class="text-sm">Track your applications</span>
                    </div>

                </div>

            </div>


            <!-- Right: Login Form -->
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
                        Welcome back
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                        Sign in to your account
                    </h2>

                    <p class="mt-2 text-gray-500">
                        Access your jobs, applications and profile.
                    </p>
                </div>


                <!-- Session Status -->
                <x-auth-session-status
                    class="mb-4"
                    :status="session('status')"
                />


                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-5">

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
                            autocomplete="username"
                            placeholder="Enter your email"
                        />

                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Password -->
                    <div>

                        <div class="flex items-center justify-between">

                            <x-input-label
                                for="password"
                                :value="__('Password')"
                                class="text-gray-700 font-semibold"
                            />

                            @if (Route::has('password.request'))
                                <a
                                    href="{{ route('password.request') }}"
                                    class="text-sm font-medium text-indigo-600 hover:text-indigo-800"
                                >
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif

                        </div>

                        <x-text-input
                            id="password"
                            class="block mt-2 w-full rounded-xl border-gray-300 focus:border-indigo-500 focus:ring-indigo-500"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="Enter your password"
                        />

                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"
                        />

                    </div>


                    <!-- Remember Me -->
                    <div class="flex items-center">

                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                        >

                        <label
                            for="remember_me"
                            class="ms-2 text-sm text-gray-600"
                        >
                            {{ __('Remember me') }}
                        </label>

                    </div>


                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold shadow-lg hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition duration-200"
                    >
                        {{ __('Sign In') }}
                    </button>

                </form>


                <!-- Register -->
                @if (Route::has('register'))
                    <div class="mt-8 text-center">

                        <p class="text-sm text-gray-500">
                            Don't have an account?

                            <a
                                href="{{ route('register') }}"
                                class="font-bold text-indigo-600 hover:text-indigo-800"
                            >
                                Create an account
                            </a>
                        </p>

                    </div>
                @endif


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