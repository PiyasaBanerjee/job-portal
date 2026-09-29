<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RecruiterApplicationController extends Controller
{
    public function index()
    {
        $company = Company::where('user_id', Auth::id())->first();

        $applications = Application::with(['candidate', 'jobPosting'])
            ->whereHas('jobPosting', function ($query) use ($company) {
                $query->where('company_id', $company->id);
            })
            ->latest()
            ->get();

        return view('recruiter.applications', compact('applications'));
    }
    public function updateStatus(Request $request, $applicationId)
    {
        $request->validate([
            'status' => 'required|in:Applied,Shortlisted,Rejected,Hired',
        ]);

        $application = Application::findOrFail($applicationId);

        $application->update([
            'status' => $request->status,
        ]);

        return redirect()
            ->route('recruiter.applications')
            ->with('success', 'Application status updated successfully!');
    }
}