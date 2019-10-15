<?php
use App\Models\Job;
use App\Utilities\Constants;

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
    $constants = new Constants();
    $categories = $constants->job_types;
    $homePageJobs = [];

    foreach($categories as $c) {
        $rss_backup = false;
        $slug = $c['slug'];
        // Query mySQL first
        $mySqlJobs = $job->where('slug', $c['slug'])->order_by("created_at", "DESC")->get();
        if(count($mySqlJobs) < 20) {
            $rss_backup = Cache::get("rss-backup-$slug"); 
            $rss_backup = json_decode($rss_backup,true);
        }

        $homePageJobs[$slug] = array_combine($mySqlJobs, $rss_backup);
    }

    return view('index', $homePageJobs);
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



