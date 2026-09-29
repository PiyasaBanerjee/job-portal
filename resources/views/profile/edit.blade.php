<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                Account Settings
            </p>

            <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
                Profile Settings
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                Manage your personal information, password, and account.
            </p>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Profile Header --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-6 sm:p-8 text-white shadow-xl mb-8">

                <div class="absolute -right-10 -top-10 w-40 h-40 bg-white/10 rounded-full"></div>
                <div class="absolute -left-10 -bottom-16 w-48 h-48 bg-white/10 rounded-full"></div>

                <div class="relative flex flex-col sm:flex-row sm:items-center gap-5">

                    <div class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur-md border border-white/20 flex items-center justify-center text-3xl font-extrabold shadow-lg">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <p class="text-blue-100 text-sm font-medium">
                            Welcome back
                        </p>

                        <h1 class="text-2xl sm:text-3xl font-extrabold mt-1">
                            {{ auth()->user()->name }}
                        </h1>

                        <p class="text-blue-100 mt-1">
                            {{ auth()->user()->email }}
                        </p>
                    </div>

                </div>
            </div>


            {{-- Profile Information --}}
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-6">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                            👤
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-gray-900">
                                Profile Information
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Update your name and email address.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>

            </div>


            {{-- Password --}}
            <div class="bg-white rounded-3xl border border-gray-100 shadow-sm overflow-hidden mb-6">

                <div class="px-6 sm:px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-xl">
                            🔐
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-gray-900">
                                Update Password
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Keep your account secure with a strong password.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>

            </div>


            {{-- Delete Account --}}
            <div class="bg-white rounded-3xl border border-red-100 shadow-sm overflow-hidden">

                <div class="px-6 sm:px-8 py-6 border-b border-red-100 bg-red-50/50">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-xl">
                            ⚠️
                        </div>

                        <div>
                            <h3 class="text-xl font-bold text-red-700">
                                Delete Account
                            </h3>

                            <p class="text-sm text-gray-500 mt-1">
                                Permanently remove your account and all associated data.
                            </p>
                        </div>

                    </div>

                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>

            </div>


            {{-- Security Tip --}}
            <div class="mt-6 rounded-2xl bg-indigo-50 border border-indigo-100 p-5">

                <div class="flex gap-4">

                    <div class="text-2xl">
                        💡
                    </div>

                    <div>
                        <h4 class="font-bold text-indigo-900">
                            Security Tip
                        </h4>

                        <p class="text-sm text-indigo-700 mt-1">
                            Never share your password with anyone. Use a strong and unique password
                            for your JobPortal account.
                        </p>
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>