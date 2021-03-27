<?php

use App\Http\Controllers\ContactController;


use App\Http\Livewire\Blog\PostComponent;
use App\Http\Livewire\Blog\ShowPostComponent;
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
Route::get('/', PostComponent::class)
    ->name('posts.index');
Route::get('posts/{postId}', ShowPostComponent::class)
    ->name('posts.show');


Route::resource('contact_us', ContactController::class);

//Views
Route::view('subscribe','details.subscribe')->name('subscribe');

Route::view('about','details.about')->name('about');


// Admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
