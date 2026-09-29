<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        Company::create([
            'user_id' => Auth::id(),
            'company_name' => $request->company_name,
            'description' => $request->description,
            'location' => $request->location,
            'website' => $request->website,
        ]);

        return redirect()
            ->route('recruiter.dashboard')
            ->with('success', 'Company profile created successfully!');
    }
}