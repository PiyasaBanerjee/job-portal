<?php
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CandidateApplicationController;
use App\Http\Controllers\RecruiterApplicationController;
use App\Http\Controllers\CandidateProfileController;
Route::get('/candidate/profile', [CandidateProfileController::class, 'create'])
    ->middleware(['auth', 'role:candidate'])
    ->name('candidate.profile');

Route::post('/candidate/profile', [CandidateProfileController::class, 'store'])
    ->middleware(['auth', 'role:candidate'])
    ->name('candidate.profile.store');
Route::put('/recruiter/applications/{application}/status', [RecruiterApplicationController::class, 'updateStatus'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('recruiter.applications.status');
Route::get('/recruiter/applications', [RecruiterApplicationController::class, 'index'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('recruiter.applications');
Route::get('/candidate/applications', [CandidateApplicationController::class, 'index'])
    ->middleware(['auth', 'role:candidate'])
    ->name('candidate.applications');
Route::post('/jobs/{jobPosting}/apply', [ApplicationController::class, 'apply'])
    ->middleware(['auth', 'role:candidate'])
    ->name('jobs.apply');
Route::get('/jobs/{jobPosting}', [JobPostingController::class, 'show'])
    ->middleware(['auth', 'role:candidate'])
    ->name('jobs.show');
Route::get('/jobs', [JobPostingController::class, 'browse'])
    ->middleware(['auth', 'role:candidate'])
    ->name('jobs.browse');
Route::delete('/job-postings/{jobPosting}', [JobPostingController::class, 'destroy'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('job-postings.destroy');
Route::put('/job-postings/{jobPosting}', [JobPostingController::class, 'update'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('job-postings.update');
Route::get('/job-postings/{jobPosting}/edit', [JobPostingController::class, 'edit'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('job-postings.edit');
Route::get('/job-postings', [JobPostingController::class, 'index'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('job-postings.index');
Route::get('/job-postings/create', [JobPostingController::class, 'create'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('job-postings.create');
Route::post('/job-postings', [JobPostingController::class, 'store'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('job-postings.store');
Route::get('/company/create', [CompanyController::class, 'create'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('company.create');

Route::post('/company', [CompanyController::class, 'store'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('company.store');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users');
Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.users.destroy');
Route::get('/admin/companies', [AdminController::class, 'companies'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.companies');
Route::delete('/admin/companies/{company}', [AdminController::class, 'destroyCompany'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.companies.destroy');
Route::get('/admin/job-postings', [AdminController::class, 'jobPostings'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.job-postings');
Route::delete('/admin/job-postings/{jobPosting}', [AdminController::class, 'destroyJobPosting'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.job-postings.destroy');
Route::get('/admin/applications', [AdminController::class, 'applications'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.applications');
Route::delete('/admin/applications/{application}', [AdminController::class, 'destroyApplication'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.applications.destroy');
Route::get('/recruiter/dashboard', [RecruiterController::class, 'dashboard'])
    ->middleware(['auth', 'role:recruiter'])
    ->name('recruiter.dashboard');
Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])
    ->middleware(['auth', 'role:candidate'])
    ->name('candidate.dashboard');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
