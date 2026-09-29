<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Company;
use App\Models\JobPosting;
use App\Models\Application;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $totalUsers = User::count();
        $totalCompanies = Company::count();
        $totalJobPostings = JobPosting::count();
        $totalApplications = Application::count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalCompanies',
            'totalJobPostings',
            'totalApplications'
        ));
    }
    public function users(): View
    {
        $users = User::latest()->get();

        return view('admin.users', compact('users'));
    }
    public function companies(): View
    {
        $companies = Company::with('user')->latest()->get();

        return view('admin.companies', compact('companies'));
    }
    public function jobPostings(): View
    {
        $jobPostings = JobPosting::with('company')->latest()->get();

        return view('admin.job-postings', compact('jobPostings'));
    }
    public function applications(): View
    {
        $applications = Application::with([
            'candidate',
            'jobPosting.company'
        ])->latest()->get();

        return view('admin.applications', compact('applications'));
    }

    public function destroyUser(User $user): RedirectResponse
    {
        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with('success', 'User deleted successfully!');
    }
    public function destroyCompany(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()
            ->route('admin.companies')
            ->with('success', 'Company deleted successfully!');
    }
    public function destroyJobPosting(JobPosting $jobPosting): RedirectResponse
    {
        $jobPosting->delete();

        return redirect()
            ->route('admin.job-postings')
            ->with('success', 'Job posting deleted successfully!');
    }
    public function destroyApplication(Application $application): RedirectResponse
    {
        $application->delete();

        return redirect()
            ->route('admin.applications')
            ->with('success', 'Application deleted successfully!');
    }
}