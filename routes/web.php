<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $totalJobs = Job::count();
    return view('index', [
        'totalJobs' => $totalJobs
    ]);
});

Route::get('/job/{slug}-{companySlug}-{job}', function (string $slug, string $companySlug, Job $job) {
    return view('job.show', [
        'slug' => $slug,
        'companySlug' => $companySlug,
        'job' => $job,
    ]);
})->name('job.show');

Route::get('/post-job', function () {
    return view('job.create');
})->name('job.create');
