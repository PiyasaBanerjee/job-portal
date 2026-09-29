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
                        One more step to
                        <span class="text-yellow-300">
                            get started.
                        </span>
                    </h2>

                    <p class="mt-6 text-blue-100 leading-7 max-w-md">
                        Verify your email address to activate your
                        JobPortal account and access your career dashboard.
                    </p>

                </div>


                <!-- Benefits -->
                <div class="space-y-4 mt-10">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            📧
                        </div>

                        <div>
                            <p class="font-semibold">
                                Check Your Inbox
                            </p>

                            <p class="text-sm text-blue-100">
                                Look for our verification email.
                            </p>
                        </div>

                    </div>


                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-white/15 flex items-center justify-center">
                            🔐
                        </div>

                        <div>
                            <p class="font-semibold">
                                Secure Your Account
                            </p>

                            <p class="text-sm text-blue-100">
                                Email verification keeps your account secure.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            <!-- Right: Verification -->
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
                        ✉️
                    </div>

                </div>


                <!-- Heading -->
                <div class="text-center mb-8">

                    <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wider">
                        Account Verification
                    </p>

                    <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                        Verify your email
                    </h2>

                    <p class="mt-4 text-gray-500 leading-6">
                        Thanks for signing up!
                        Before getting started, please verify your email
                        address by clicking the link we sent to you.
                    </p>

                    <p class="mt-3 text-sm text-gray-400">
                        Didn't receive the email?
                        You can request another verification link below.
                    </p>

                </div>


                <!-- Success Message -->
                @if (session('status') == 'verification-link-sent')

                    <div class="mb-6 rounded-xl bg-green-50 border border-green-200 p-4">

                        <div class="flex items-start gap-3">

                            <div class="text-green-600 text-lg">
                                ✓
                            </div>

                            <p class="text-sm font-medium text-green-700">
                                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                            </p>

                        </div>

                    </div>

                @endif


                <!-- Resend Verification -->
                <form
                    method="POST"
                    action="{{ route('verification.send') }}"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full py-3.5 px-4 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-bold shadow-lg hover:from-blue-700 hover:to-indigo-700 hover:shadow-xl transition duration-200"
                    >
                        {{ __('Resend Verification Email') }}
                    </button>

                </form>


                <!-- Logout -->
                <div class="mt-6 text-center">

                    <form
                        method="POST"
                        action="{{ route('logout') }}"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="text-sm font-semibold text-gray-500 hover:text-indigo-600 transition"
                        >
                            {{ __('Log Out') }}
                        </button>

                    </form>

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