<x-app-layout>

    <x-slot name="header">
        <div>
            <p class="text-sm text-blue-600 font-semibold mb-1">
                Career Profile
            </p>

            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                Candidate Profile
            </h2>
        </div>
    </x-slot>


    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50/40 to-indigo-50/30 py-10">

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

            {{-- Profile Hero --}}
            <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 shadow-xl mb-8">

                <div class="absolute -right-16 -top-24 w-72 h-72 rounded-full bg-white/10"></div>
                <div class="absolute right-40 -bottom-32 w-64 h-64 rounded-full bg-white/10"></div>

                <div class="relative p-7 sm:p-9">

                    <div class="flex flex-col sm:flex-row sm:items-center gap-5">

                        <div class="w-20 h-20 shrink-0 rounded-3xl bg-white/15 border border-white/25 backdrop-blur-sm flex items-center justify-center text-4xl shadow-lg">
                            👤
                        </div>

                        <div>
                            <p class="text-blue-100 text-sm font-semibold uppercase tracking-wider">
                                Professional Profile
                            </p>

                            <h1 class="text-3xl sm:text-4xl font-bold text-white mt-1">
                                My Profile
                            </h1>

                            <p class="text-blue-100 mt-2 max-w-2xl">
                                Keep your professional information updated so recruiters can discover your skills and experience.
                            </p>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Success Message --}}
            @if(session('success'))

                <div class="mb-6 rounded-2xl bg-green-50 border border-green-200 p-5 flex items-start gap-4 shadow-sm">

                    <div class="w-11 h-11 shrink-0 rounded-xl bg-green-100 flex items-center justify-center text-green-600 text-xl">
                        ✓
                    </div>

                    <div>
                        <p class="font-bold text-green-800">
                            Profile Updated Successfully
                        </p>

                        <p class="text-sm text-green-700 mt-1">
                            {{ session('success') }}
                        </p>
                    </div>

                </div>

            @endif


            {{-- Validation Errors --}}
            @if($errors->any())

                <div class="mb-6 rounded-2xl bg-red-50 border border-red-200 p-5 shadow-sm">

                    <div class="flex items-start gap-3">

                        <div class="w-10 h-10 shrink-0 rounded-xl bg-red-100 flex items-center justify-center text-red-600">
                            !
                        </div>

                        <div>

                            <p class="font-bold text-red-800 mb-2">
                                Please check the following:
                            </p>

                            <ul class="list-disc list-inside text-sm text-red-700 space-y-1">

                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach

                            </ul>

                        </div>

                    </div>

                </div>

            @endif


            <form
                method="POST"
                action="{{ route('candidate.profile.store') }}"
                enctype="multipart/form-data"
            >

                @csrf


                {{-- Personal Information --}}
                <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden mb-6">

                    <div class="px-6 sm:px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                                👤
                            </div>

                            <div>
                                <h2 class="text-xl font-bold text-gray-900">
                                    Personal Information
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Add your contact information.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6 sm:p-8">

                        <label
                            for="phone"
                            class="block text-sm font-bold text-gray-700 mb-2"
                        >
                            Phone Number
                        </label>

                        <div class="relative">

                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-lg">
                                📱
                            </span>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', $profile->phone ?? '') }}"
                                placeholder="Enter your phone number"
                                class="w-full pl-12 pr-4 py-3.5 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm transition"
                            >

                        </div>

                        @error('phone')
                            <p class="text-sm text-red-600 mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Professional Information --}}
                <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden mb-6">

                    <div class="px-6 sm:px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-indigo-100 flex items-center justify-center text-2xl">
                                💼
                            </div>

                            <div>
                                <h2 class="text-xl font-bold text-gray-900">
                                    Professional Information
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Tell recruiters about your skills, education and experience.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6 sm:p-8 space-y-7">

                        {{-- Skills --}}
                        <div>

                            <label
                                for="skills"
                                class="block text-sm font-bold text-gray-700 mb-2"
                            >
                                Skills
                            </label>

                            <textarea
                                id="skills"
                                name="skills"
                                rows="4"
                                placeholder="Example: PHP, Laravel, MySQL, HTML, CSS, JavaScript"
                                class="w-full px-4 py-3.5 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm resize-none transition"
                            >{{ old('skills', $profile->skills ?? '') }}</textarea>

                            <p class="text-xs text-gray-400 mt-2">
                                💡 Mention your most relevant technical and professional skills.
                            </p>

                            @error('skills')
                                <p class="text-sm text-red-600 mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Education --}}
                        <div>

                            <label
                                for="education"
                                class="block text-sm font-bold text-gray-700 mb-2"
                            >
                                Education
                            </label>

                            <textarea
                                id="education"
                                name="education"
                                rows="4"
                                placeholder="Example: MCA, BCA"
                                class="w-full px-4 py-3.5 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm resize-none transition"
                            >{{ old('education', $profile->education ?? '') }}</textarea>

                            <p class="text-xs text-gray-400 mt-2">
                                🎓 Add your academic qualifications.
                            </p>

                            @error('education')
                                <p class="text-sm text-red-600 mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>


                        {{-- Experience --}}
                        <div>

                            <label
                                for="experience"
                                class="block text-sm font-bold text-gray-700 mb-2"
                            >
                                Experience
                            </label>

                            <textarea
                                id="experience"
                                name="experience"
                                rows="5"
                                placeholder="Describe your work experience, internships, projects or relevant training."
                                class="w-full px-4 py-3.5 rounded-xl border-gray-300 focus:border-blue-500 focus:ring-blue-500 shadow-sm resize-none transition"
                            >{{ old('experience', $profile->experience ?? '') }}</textarea>

                            <p class="text-xs text-gray-400 mt-2">
                                🚀 Include internships, projects, training and other relevant experience.
                            </p>

                            @error('experience')
                                <p class="text-sm text-red-600 mt-2">
                                    {{ $message }}
                                </p>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- Resume --}}
                <div class="bg-white rounded-3xl border border-gray-200 shadow-sm overflow-hidden mb-6">

                    <div class="px-6 sm:px-8 py-6 border-b border-gray-100 bg-gradient-to-r from-purple-50 to-white">

                        <div class="flex items-center gap-4">

                            <div class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center text-2xl">
                                📄
                            </div>

                            <div>
                                <h2 class="text-xl font-bold text-gray-900">
                                    Resume
                                </h2>

                                <p class="text-sm text-gray-500 mt-1">
                                    Upload your latest resume for recruiters.
                                </p>
                            </div>

                        </div>

                    </div>


                    <div class="p-6 sm:p-8">

                        <label
                            for="resume"
                            class="block text-sm font-bold text-gray-700 mb-2"
                        >
                            Upload Resume
                        </label>

                        <div class="rounded-2xl border-2 border-dashed border-gray-300 bg-gray-50 p-6 hover:border-blue-400 hover:bg-blue-50/30 transition">

                            <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                                <div class="w-12 h-12 shrink-0 rounded-xl bg-red-100 flex items-center justify-center text-2xl">
                                    📄
                                </div>

                                <div class="flex-1">

                                    <input
                                        type="file"
                                        id="resume"
                                        name="resume"
                                        accept=".pdf,.doc,.docx"
                                        class="w-full text-sm text-gray-600 file:mr-4 file:py-2.5 file:px-4 file:rounded-lg file:border-0 file:bg-blue-600 file:text-white file:font-semibold hover:file:bg-blue-700"
                                    >

                                    <p class="text-xs text-gray-500 mt-2">
                                        Accepted formats: PDF, DOC, DOCX
                                    </p>

                                </div>

                            </div>

                        </div>


                        {{-- Current Resume --}}
                        @if($profile && $profile->resume)

                            <div class="mt-5 rounded-2xl bg-green-50 border border-green-200 p-5">

                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                                    <div class="flex items-center gap-4">

                                        <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center text-xl">
                                            ✓
                                        </div>

                                        <div>

                                            <p class="font-bold text-green-900">
                                                Current Resume Available
                                            </p>

                                            <p class="text-sm text-green-700 mt-1">
                                                Your uploaded resume is ready for recruiters to view.
                                            </p>

                                        </div>

                                    </div>


                                    <a
                                        href="{{ asset('storage/' . $profile->resume) }}"
                                        target="_blank"
                                        class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gray-900 hover:bg-gray-800 text-white rounded-xl text-sm font-semibold transition"
                                    >
                                        📄 View Resume
                                    </a>

                                </div>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- Save Section --}}
                <div class="bg-white rounded-3xl border border-gray-200 shadow-sm p-6 sm:p-7">

                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5">

                        <div>

                            <p class="font-bold text-gray-800">
                                Ready to update your profile?
                            </p>

                            <p class="text-sm text-gray-500 mt-1">
                                Make sure your information is accurate before saving.
                            </p>

                        </div>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center gap-2 px-8 py-3.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white font-bold rounded-xl shadow-md shadow-blue-200 hover:-translate-y-0.5 transition duration-200"
                        >
                            💾 Save Profile
                        </button>

                    </div>

                </div>

            </form>


            {{-- Bottom Note --}}
            <div class="mt-6 text-center">

                <p class="text-sm text-gray-400">
                    A complete profile helps recruiters understand your professional background.
                </p>

            </div>

        </div>

    </div>

</x-app-layout>