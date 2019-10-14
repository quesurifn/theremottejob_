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
    $categories = [
        ["slug" => "customer-support", "backup_rss" => "https://weworkremotely.com/categories/remote-customer-support-jobs.rss"],
        ["slug" => "product", "backup_rss" => "https://weworkremotely.com/categories/remote-product-jobs.rss"],
        ["slug" => "developing", "backup_rss" => "https://weworkremotely.com/categories/remote-programming-jobs.rss"],
        ["slug" => "sales-and-marketing", "backup_rss" => "https://weworkremotely.com/categories/remote-sales-and-marketing-jobs.rss"],
        ["slug" => "buisness-and-management", "backup_rss" => "https://weworkremotely.com/categories/remote-business-and-management-jobs.rss"],
        ["slug" => "copywriting", "backup_rss" =>  "https://weworkremotely.com/categories/remote-copywriting-jobs.rss"],
        ["slug" => "design", "backup_rss" => "https://weworkremotely.com/categories/remote-design-jobs.rss"],
        ["slug" => "devops-and-system-admin", "backup_rss" => "https://weworkremotely.com/categories/remote-devops-sysadmin-jobs.rss"],
        ["slug" => "finance-and-legal", "backup_rss" => "https://weworkremotely.com/categories/remote-finance-and-legal-jobs.rss"],
        ["slug" => "all-other", "backup_rss" => "https://weworkremotely.com/categories/remote-jobs.rss"],
    ];

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



