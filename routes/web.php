<?php

use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\RoomChatController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

route::middleware('auth')->group(function () {
//    route::get('/room-chat', [RoomChatController::class, 'listRoomChat']); 
   route::post('/room-chat', [RoomChatController::class, 'createRoomChat']);
   route::get('/room-chat/{id}', [RoomChatController::class, 'showRoomChat']);
   route::post('conversation', [ChatBotController::class, 'getChatResponse']);
});

require __DIR__.'/auth.php';
