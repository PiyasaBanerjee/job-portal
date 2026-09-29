<x-app-layout>

    <x-slot name="header">

        <div>
            <p class="text-sm text-indigo-600 font-semibold uppercase tracking-wider">
                Administration
            </p>

            <h2 class="mt-1 text-2xl font-extrabold text-gray-900">
                Manage Users
            </h2>
        </div>

    </x-slot>


    <div class="py-10">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


            <!-- Page Introduction -->
            <div class="mb-8">

                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <h1 class="text-3xl font-extrabold text-gray-900">
                            All Users
                        </h1>

                        <p class="mt-2 text-gray-500">
                            View and manage all registered JobPortal users.
                        </p>

                    </div>


                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-indigo-50 text-indigo-700 font-semibold text-sm w-fit">

                        <span>👥</span>

                        <span>
                            {{ $users->count() }} Users
                        </span>

                    </div>

                </div>

            </div>


            @if($users->count() > 0)


                <!-- Users List -->
                <div class="space-y-4">

                    @foreach($users as $user)

                        <div class="bg-white rounded-2xl border border-gray-100 shadow-sm hover:shadow-md transition p-5 sm:p-6">

                            <div class="flex flex-col lg:flex-row lg:items-center gap-5">


                                <!-- User Information -->
                                <div class="flex items-center gap-4 flex-1">


                                    <!-- Avatar -->
                                    <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-blue-500 to-indigo-600 text-white flex items-center justify-center text-xl font-bold shadow-sm">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>


                                    <!-- Details -->
                                    <div class="min-w-0">

                                        <h3 class="text-lg font-bold text-gray-900">
                                            {{ $user->name }}
                                        </h3>

                                        <p class="text-sm text-gray-500 mt-1 break-all">
                                            {{ $user->email }}
                                        </p>

                                    </div>

                                </div>


                                <!-- Role -->
                                <div>

                                    @if($user->role === 'admin')

                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold bg-purple-50 text-purple-700">
                                            🛡️ Admin
                                        </span>

                                    @elseif($user->role === 'recruiter')

                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold bg-green-50 text-green-700">
                                            🏢 Recruiter
                                        </span>

                                    @else

                                        <span class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full text-xs font-bold bg-blue-50 text-blue-700">
                                            👤 Candidate
                                        </span>

                                    @endif

                                </div>


                                <!-- Delete -->
                                <div>

                                    <form
                                        action="{{ route('admin.users.destroy', $user->id) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            onclick="return confirm('Are you sure you want to delete this user?')"
                                            class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-red-50 text-red-600 font-semibold text-sm hover:bg-red-100 transition"
                                        >
                                            🗑️ Delete
                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else


                <!-- Empty State -->
                <div class="bg-white rounded-3xl border border-gray-100 shadow-sm p-12 text-center">

                    <div class="w-20 h-20 mx-auto rounded-2xl bg-gray-100 flex items-center justify-center text-4xl">
                        👥
                    </div>

                    <h3 class="mt-5 text-xl font-bold text-gray-900">
                        No Users Found
                    </h3>

                    <p class="mt-2 text-gray-500">
                        There are currently no registered users on JobPortal.
                    </p>

                </div>


            @endif


        </div>

    </div>

</x-app-layout>