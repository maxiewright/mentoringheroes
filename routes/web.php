<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VlogController;
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

/*
 * Front End
 */
Route::get('/', [PostController::class, 'index'])->name('home');
Route::resource('posts', PostController::class);
Route::resource('vlogs', VlogController::class);
Route::resource('podcasts', PodcastController::class);
Route::resource('courses', CourseController::class);

//Views
Route::view('subscribe','details.subscribe')->name('subscribe');
Route::view('contact','details.contact')->name('contact');
Route::view('about','details.about')->name('about');



// Admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
