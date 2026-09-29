<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CandidateController extends Controller
{
    public function dashboard(): View
    {
        return view('candidate.dashboard');
    }
}