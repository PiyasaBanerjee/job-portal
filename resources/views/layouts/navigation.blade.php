<nav x-data="{ open: false }" class="bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-sm sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-20">

            {{-- Logo + Navigation --}}
            <div class="flex items-center">

                {{-- Logo --}}
                <div class="shrink-0 flex items-center">

                    <a href="
                        @if(auth()->user()->role === 'admin')
                            {{ route('admin.dashboard') }}
                        @elseif(auth()->user()->role === 'recruiter')
                            {{ route('recruiter.dashboard') }}
                        @else
                            {{ route('candidate.dashboard') }}
                        @endif
                    " class="flex items-center gap-3 group">

                        <div class="w-11 h-11 rounded-2xl bg-gradient-to-br from-blue-600 to-indigo-600 flex items-center justify-center text-white text-xl font-extrabold shadow-md group-hover:scale-105 transition">
                            J
                        </div>

                        <div class="hidden sm:block">
                            <div class="text-xl font-extrabold tracking-tight text-gray-900">
                                Job<span class="text-indigo-600">Portal</span>
                            </div>

                            <div class="text-[10px] text-gray-400 font-semibold uppercase tracking-widest">
                                Career & Recruitment
                            </div>
                        </div>

                    </a>

                </div>


                {{-- Desktop Navigation --}}
                <div class="hidden sm:flex items-center ml-10 gap-1">

                    @auth

                        {{-- Dashboard --}}
                        @if(auth()->user()->role === 'admin')

                            <a href="{{ route('admin.dashboard') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('admin.dashboard')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                🏠 Dashboard
                            </a>

                        @elseif(auth()->user()->role === 'recruiter')

                            <a href="{{ route('recruiter.dashboard') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('recruiter.dashboard')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                🏠 Dashboard
                            </a>

                        @else

                            <a href="{{ route('candidate.dashboard') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('candidate.dashboard')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                🏠 Dashboard
                            </a>

                        @endif


                        {{-- Candidate Navigation --}}
                        @if(auth()->user()->role === 'candidate')

                            <a href="{{ route('jobs.browse') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('jobs.*')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                💼 Browse Jobs
                            </a>

                            <a href="{{ route('candidate.applications') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('candidate.applications')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                📄 Applications
                            </a>

                            <a href="{{ route('candidate.profile') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('candidate.profile')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                👤 Profile
                            </a>

                        @endif


                        {{-- Recruiter Navigation --}}
                        @if(auth()->user()->role === 'recruiter')

                            <a href="{{ route('company.create') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('company.create')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                🏢 Company
                            </a>

                            <a href="{{ route('job-postings.index') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('job-postings.*')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                💼 My Jobs
                            </a>

                            <a href="{{ route('recruiter.applications') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('recruiter.applications')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                👥 Applicants
                            </a>

                        @endif


                        {{-- Admin Navigation --}}
                        @if(auth()->user()->role === 'admin')

                            <a href="{{ route('admin.users') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('admin.users*')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                👥 Users
                            </a>

                            <a href="{{ route('admin.companies') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('admin.companies*')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                🏢 Companies
                            </a>

                            <a href="{{ route('admin.job-postings') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('admin.job-postings*')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                💼 Jobs
                            </a>

                            <a href="{{ route('admin.applications') }}"
                               class="px-4 py-2.5 rounded-xl text-sm font-semibold transition
                               {{ request()->routeIs('admin.applications*')
                                    ? 'bg-indigo-50 text-indigo-700'
                                    : 'text-gray-600 hover:bg-gray-50 hover:text-indigo-600' }}">
                                📄 Applications
                            </a>

                        @endif

                    @endauth

                </div>

            </div>


            {{-- User Menu --}}
            <div class="hidden sm:flex sm:items-center">

                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button class="flex items-center gap-3 px-3 py-2 rounded-xl hover:bg-gray-50 transition">

                            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 text-white flex items-center justify-center font-bold">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </div>

                            <div class="hidden md:block text-left">

                                <div class="text-sm font-bold text-gray-800">
                                    {{ Auth::user()->name }}
                                </div>

                                <div class="text-xs text-gray-400 capitalize">
                                    {{ Auth::user()->role }}
                                </div>

                            </div>

                            <svg class="fill-current h-4 w-4 text-gray-400"
                                 xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20">

                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />

                            </svg>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        <div class="px-4 py-3 border-b border-gray-100">

                            <p class="text-sm font-bold text-gray-800">
                                {{ Auth::user()->name }}
                            </p>

                            <p class="text-xs text-gray-500 mt-1 break-all">
                                {{ Auth::user()->email }}
                            </p>

                        </div>

                        <x-dropdown-link :href="route('profile.edit')">
                            👤 {{ __('Profile Settings') }}
                        </x-dropdown-link>


                        {{-- Logout --}}
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                🚪 {{ __('Log Out') }}
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            {{-- Mobile Button --}}
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center p-2.5 rounded-xl text-gray-500 hover:text-indigo-600 hover:bg-indigo-50 focus:outline-none transition"
                >

                    <svg class="h-6 w-6"
                         stroke="currentColor"
                         fill="none"
                         viewBox="0 0 24 24">

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    {{-- Mobile Navigation --}}
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-gray-100 bg-white"
    >

        <div class="px-4 pt-4 pb-3 space-y-1">

            @auth

                {{-- Dashboard --}}
                @if(auth()->user()->role === 'admin')

                    <x-responsive-nav-link
                        :href="route('admin.dashboard')"
                        :active="request()->routeIs('admin.dashboard')"
                    >
                        🏠 Dashboard
                    </x-responsive-nav-link>

                @elseif(auth()->user()->role === 'recruiter')

                    <x-responsive-nav-link
                        :href="route('recruiter.dashboard')"
                        :active="request()->routeIs('recruiter.dashboard')"
                    >
                        🏠 Dashboard
                    </x-responsive-nav-link>

                @else

                    <x-responsive-nav-link
                        :href="route('candidate.dashboard')"
                        :active="request()->routeIs('candidate.dashboard')"
                    >
                        🏠 Dashboard
                    </x-responsive-nav-link>

                @endif


                {{-- Candidate --}}
                @if(auth()->user()->role === 'candidate')

                    <x-responsive-nav-link
                        :href="route('jobs.browse')"
                        :active="request()->routeIs('jobs.*')"
                    >
                        💼 Browse Jobs
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('candidate.applications')"
                        :active="request()->routeIs('candidate.applications')"
                    >
                        📄 Applications
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('candidate.profile')"
                        :active="request()->routeIs('candidate.profile')"
                    >
                        👤 Profile
                    </x-responsive-nav-link>

                @endif


                {{-- Recruiter --}}
                @if(auth()->user()->role === 'recruiter')

                    <x-responsive-nav-link
                        :href="route('company.create')"
                        :active="request()->routeIs('company.create')"
                    >
                        🏢 Company
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('job-postings.index')"
                        :active="request()->routeIs('job-postings.*')"
                    >
                        💼 My Jobs
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('recruiter.applications')"
                        :active="request()->routeIs('recruiter.applications')"
                    >
                        👥 Applicants
                    </x-responsive-nav-link>

                @endif


                {{-- Admin --}}
                @if(auth()->user()->role === 'admin')

                    <x-responsive-nav-link
                        :href="route('admin.users')"
                        :active="request()->routeIs('admin.users*')"
                    >
                        👥 Users
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('admin.companies')"
                        :active="request()->routeIs('admin.companies*')"
                    >
                        🏢 Companies
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('admin.job-postings')"
                        :active="request()->routeIs('admin.job-postings*')"
                    >
                        💼 Jobs
                    </x-responsive-nav-link>

                    <x-responsive-nav-link
                        :href="route('admin.applications')"
                        :active="request()->routeIs('admin.applications*')"
                    >
                        📄 Applications
                    </x-responsive-nav-link>

                @endif

            @endauth

        </div>


        {{-- Mobile User Section --}}
        <div class="pt-4 pb-4 border-t border-gray-100 bg-gray-50">

            <div class="px-4 flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-indigo-500 to-blue-600 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <div>

                    <div class="font-bold text-gray-800">
                        {{ Auth::user()->name }}
                    </div>

                    <div class="text-sm text-gray-500">
                        {{ Auth::user()->email }}
                    </div>

                </div>

            </div>


            <div class="mt-3 space-y-1">

                <x-responsive-nav-link :href="route('profile.edit')">
                    👤 Profile Settings
                </x-responsive-nav-link>


                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        🚪 Log Out
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>