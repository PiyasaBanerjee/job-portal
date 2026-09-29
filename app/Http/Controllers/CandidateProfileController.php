<?php

namespace App\Http\Controllers;

use App\Models\CandidateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidateProfileController extends Controller
{
    public function create()
    {
        $profile = CandidateProfile::where('user_id', Auth::id())->first();

        return view('candidate.profile', compact('profile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:20',
            'skills' => 'nullable|string',
            'education' => 'nullable|string',
            'experience' => 'nullable|string',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
        $profile = CandidateProfile::where('user_id', Auth::id())->first();

         $resumePath = $profile?->resume;

            if ($request->hasFile('resume')) {

                $existingProfile = CandidateProfile::where('user_id', Auth::id())->first();

                if ($existingProfile && $existingProfile->resume) {
                    Storage::disk('public')->delete($existingProfile->resume);
                }

                $resumePath = $request->file('resume')->store('resumes', 'public');
            }
        CandidateProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'phone' => $request->phone,
                'skills' => $request->skills,
                'education' => $request->education,
                'experience' => $request->experience,
                'resume' => $resumePath,
            ]
        );

        return redirect()
            ->route('candidate.profile')
            ->with('success', 'Profile saved successfully!');
    }
}
