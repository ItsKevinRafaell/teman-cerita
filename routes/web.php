<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Assessment\UserAssessment;
use App\Http\Controllers\Conversation\ChatBotController;
use App\Http\Controllers\Conversation\ConversationController;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/article', [GuestController::class, 'article'])->name('article');
Route::get('/about', [GuestController::class, 'about'])->name('about');
Route::get('/contact', [GuestController::class, 'contact'])->name('contact');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

route::group(['middleware' => 'auth'], function () {
   Route::get('/dashboard', [ConversationController::class, 'dashboard']);
    Route::get('/conversation', [ConversationController::class, 'getConversationContent']);

    Route::post('conversation', [ChatBotController::class, 'getChatResponse']);
});

route::get('/assessment', [UserAssessment::class, 'getAllAssessment']);
route::get('/user-assessment', [UserAssessment::class, 'getUserAsssessment']);
route::get('/user-assessment/{id}', [UserAssessment::class, 'detailUserAssessment']);
route::post('/assessment', [UserAssessment::class, 'createAssessment']);
route::post('/submit-assessment', [UserAssessment::class, 'storeAssessment']);


require __DIR__.'/auth.php';
