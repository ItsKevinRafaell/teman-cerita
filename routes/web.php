<?php

use App\Http\Controllers\Chat\ChatBotController;
use App\Http\Controllers\Chat\RoomChatController;
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
   Route::get('/dashboard', [RoomChatController::class, 'dashboard']);
    Route::get('/room-chat/{id}', [RoomChatController::class, 'showRoomChat']);
    Route::post('/room-chat', [RoomChatController::class, 'createRoomChat']);
    
    Route::post('conversation', [ChatBotController::class, 'getChatResponse']);
});

require __DIR__.'/auth.php';
