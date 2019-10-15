<?php
use App\Models\Job;

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
    
    $job = new Job();

    return view('index');
});

Route::get('/post-a-job', function () {
    return view('post');
});

Route::get('/why-us', function () {
    return view('why');
});

Route::get('/privacy-policy', function () {
    return view('privacy');
});

Route::get('/terms-of-use', function () {
    return view('terms');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/{post-slug}', function () {
    return view('blogpost');
});


Route::get('/job/{job-slug}', function () {
    return view('job');
});



