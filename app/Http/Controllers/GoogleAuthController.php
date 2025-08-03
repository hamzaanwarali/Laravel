<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirectUrl(config('services.google.redirect'))
            ->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')
                ->stateless()
                ->user();
            
            if (empty($googleUser->email)) {
                throw new \Exception('حساب جوجل لا يحتوي على بريد إلكتروني');
            }
            
            $user = User::where('email', $googleUser->email)->first();
            
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt(Str::random(24)),
                    'email_verified_at' => now(),
                ]);
            } elseif (empty($user->google_id)) {
                $user->update(['google_id' => $googleUser->id]);
            }

            Auth::login($user, true);
            return redirect('/dashboard');
            
        } catch (\Exception $e) {
            Log::error('Google Auth Error: ' . $e->getMessage());
            return redirect('/login')->with('error', 'فشل الدخول عبر جوجل: ' . $e->getMessage());
        }
    }
}