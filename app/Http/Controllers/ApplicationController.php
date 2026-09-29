<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function apply(Request $request, $jobPostingId)
    {
        $request->validate([
            'cover_letter' => 'nullable|string',
        ]);

        $alreadyApplied = Application::where('job_posting_id', $jobPostingId)
            ->where('candidate_id', auth()->id())
            ->exists();

        if ($alreadyApplied) {
            return redirect()
                ->route('jobs.show', $jobPostingId)
                ->with('error', 'You have already applied for this job.');
        }

        Application::create([
            'job_posting_id' => $jobPostingId,
            'candidate_id' => auth()->id(),
            'cover_letter' => $request->cover_letter,
            'status' => 'Applied',
        ]);

        return redirect()
            ->route('jobs.show', $jobPostingId)
            ->with('success', 'Application submitted successfully!');
    }
}