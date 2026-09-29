<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class RecruiterController extends Controller
{
    public function dashboard(): View
    {
        return view('recruiter.dashboard');
    }
}