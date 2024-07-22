<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            // Cek jika pengguna sudah ada di database berdasarkan email
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // Jika pengguna sudah ada, langsung izinkan login
                Auth::login($user);
                Log::info('Google User: Already Registered');
            } else {
                // Jika pengguna belum ada, buat akun baru dan izinkan login
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt('user1234'), // Gunakan password default atau string acak
                ]);
                Auth::login($user);
                Log::info('Google User: Not yet Registered');
            }
            return redirect()->intended('/dashboard');
        } catch (Exception $e) {
            // Log pesan error untuk debugging
            Log::error('Google OAuth error:', ['error' => $e->getMessage()]);
            return redirect('/')->with('error', 'Failed to login with Google.');
        }
    }
}
