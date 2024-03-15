<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAuthController extends Controller
{
    public function redirect($github)
    {
        return Socialite::driver($github)
            ->setScopes(['read:user', 'read:repo', 'user:email', 'issues:read'])
            ->redirect();
    }

    public function callback($github)
    {
        try {
            $socialUser = Socialite::driver($github)->user();

            $user = User::where([
                'github' => $github,
                'github_id' => $socialUser->id,
            ])->first();

            if (! $user) {
                $user = User::create([
                    'username' => User::generateUsername($socialUser->getNickname()),
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'github' => $github,
                    'github_id' => $socialUser->getId(),
                    'github_token' => $socialUser->token,
                    'email_verified_at' => now(),
                ]);
            }

            auth()->login($user);

            return redirect()->intended(route('dashboard'));
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('login')->with('error', $e->getMessage());
        }
    }
}
