<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard'); 

route::group(['middleware' => 'auth'], function () {
   Route::get('/dashboard', [ConversationController::class, 'dashboard']);
    Route::get('/conversation', [ConversationController::class, 'getConversationContent']);
    
    Route::post('conversation', [ChatBotController::class, 'getChatResponse']);
});

require __DIR__.'/auth.php';
