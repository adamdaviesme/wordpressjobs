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

Route::get('/job/{id}', function (int $id) {
    return view('single');
})->name('job.single');
