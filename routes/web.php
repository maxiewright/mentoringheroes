<?php

use App\Http\Controllers\Auth\SocialAccountController;
use App\Http\Livewire\Blog\IndexPage;
use App\Http\Livewire\Blog\ShowPage;
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

Route::get('oauth', function (){
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
Route::get('/', IndexPage::class)
    ->name('posts.index');

Route::get('posts/{post}', ShowPage::class)
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


require __DIR__.'/auth.php';
