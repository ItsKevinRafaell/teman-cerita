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
})->middleware(['auth', 'verified'])->name('dashboard'); 

route::group(['middleware' => 'auth'], function () {
   Route::get('/dashboard', [RoomChatController::class, 'dashboard']);
    Route::get('/room-chat/{id}', [RoomChatController::class, 'showRoomChat']);
    Route::post('/room-chat', [RoomChatController::class, 'createRoomChat']);
    
    Route::post('conversation', [ChatBotController::class, 'getChatResponse']);
});



Route::get('auth/google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('auth/google/callback', function () {
    try {
        $googleUser = Socialite::driver('google')->user();
        // Log Google user data for debugging
        Log::info('Google User:', [
            'all' => $googleUser,
            // 'email' => $googleUser->getEmail(),
            // 'name' => $googleUser->getName(),
            // 'id' => $googleUser->getId(),
        ]);
    } catch (Exception $e) {
        // Log the exception message for debugging
        Log::error('Google OAuth error:', ['error' => $e->getMessage()]);
        return redirect('/')->with('error', 'Failed to login with Google.');
    }

    $user = User::firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(), 
            'password' => $googleUser->getName(),
        ]
    );

    Auth::login($user, true);

    return redirect('/dashboard');
});
require __DIR__.'/auth.php';
