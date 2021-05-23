<?php

use App\Http\Controllers\Auth\SocialAccountController;
use App\Http\Controllers\ContactController;


use App\Http\Livewire\Blog\PostComponent;
use App\Http\Livewire\Blog\ShowPostComponent;
use App\Http\Livewire\ContactComponent;
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

Route::get('social', function (){
   $user = \App\Models\User::find(14);

   return $user->hasSocialAccount();

});


/*
 * Auth
 */
Route::get('login/{provider}',         [SocialAccountController::class, 'redirectToProvider']);
Route::get('login/{provider}/callback',[SocialAccountController::class, 'handleProviderCallback']);


/*
 * Front End
 */
Route::get('/', PostComponent::class)
    ->name('posts.index');
Route::get('posts/{post}', ShowPostComponent::class)
    ->name('posts.show');

Route::get('contact', ContactComponent::class)
    ->name('contact');


//Views
Route::view('subscribe','details.subscribe')
    ->name('subscribe');
Route::view('about','details.about')
    ->name('about');
Route::view('terms_and_conditions', 'legal.terms-and-conditions')
    ->name('terms_and_conditions');
Route::view('privacy_policy', 'legal.privacy-policy')
    ->name('privacy_policy');

// Admin
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

