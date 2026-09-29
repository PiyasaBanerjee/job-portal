<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CandidateApplicationController extends Controller
{
    public function index()
    {
        $applications = \App\Models\Application::with('jobPosting.company')
            ->where('candidate_id', auth()->id())
            ->latest()
            ->get();

        return view('candidate.applications', compact('applications'));
    }
}