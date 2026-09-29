<?php

namespace App\Http\Controllers;

use App\Models\JobPosting;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobPostingController extends Controller
{
    public function index()
        {
            $company = Company::where('user_id', Auth::id())->first();

            $jobPostings = JobPosting::where('company_id', $company->id)
                ->latest()
                ->get();

            return view('job_postings.index', compact('jobPostings'));
        }
    public function browse(Request $request)
        {
            $query = JobPosting::with('company');

            if ($request->filled('search')) {
                $query->where('title', 'like', '%' . $request->search . '%');
            }

            if ($request->filled('location')) {
                $location = trim($request->location);

                $query->where('location', 'like', '%' . $location . '%');
            }

            if ($request->filled('job_type')) {
                $query->where('job_type', $request->job_type);
            }

            $jobPostings = $query->latest()->get();

            return view('job_postings.browse', compact('jobPostings'));
        }
    public function show(JobPosting $jobPosting)
        {
            $jobPosting->load('company');

            return view('job_postings.show', compact('jobPosting'));
        }
    public function edit(JobPosting $jobPosting)
        {
            $company = Company::where('user_id', Auth::id())->first();

            if (!$company || $jobPosting->company_id !== $company->id) {
                abort(403);
            }

            return view('job_postings.edit', compact('jobPosting'));
        }
    public function update(Request $request, JobPosting $jobPosting)
        {
            $company = Company::where('user_id', Auth::id())->first();

            if (!$company || $jobPosting->company_id !== $company->id) {
                abort(403);
            }

            $request->validate([
                'title' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'salary' => 'nullable|string|max:255',
                'job_type' => 'required|string',
                'description' => 'required|string',
            ]);

            $jobPosting->update([
                'title' => $request->title,
                'location' => $request->location,
                'salary' => $request->salary,
                'job_type' => $request->job_type,
                'description' => $request->description,
            ]);

            return redirect()
                ->route('job-postings.index')
                ->with('success', 'Job posting updated successfully!');
        }
    public function destroy(JobPosting $jobPosting)
        {
            $company = Company::where('user_id', Auth::id())->first();

            if (!$company || $jobPosting->company_id !== $company->id) {
                abort(403);
            }

            $jobPosting->delete();

            return redirect()
                ->route('job-postings.index')
                ->with('success', 'Job posting deleted successfully!');
        }
    public function create()
        {
            $company = Company::where('user_id', Auth::id())->first();

            if (!$company) {
                return redirect()->route('company.create')
                    ->with('error', 'Please create your company profile first.');
            }

            return view('job_postings.create', compact('company'));
        }

    public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'salary' => 'nullable|string|max:255',
                'job_type' => 'required|string',
                'description' => 'required|string',
            ]);

            $company = Company::where('user_id', Auth::id())->first();

            JobPosting::create([
                'company_id' => $company->id,
                'title' => $request->title,
                'location' => $request->location,
                'salary' => $request->salary,
                'job_type' => $request->job_type,
                'description' => $request->description,
            ]);

            return redirect()->route('recruiter.dashboard')
                ->with('success', 'Job posted successfully!');
        }
}