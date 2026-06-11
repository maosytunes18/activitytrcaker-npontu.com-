<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialAuthController extends \Illuminate\Routing\Controller
{

    public function redirectToGoogle(): RedirectResponse
    {
        // Fall back to the app's callback route when GOOGLE_REDIRECT_URI is not set
        // so the redirect_uri is always a fully-qualified URL Google accepts.
        return Socialite::driver('google')
            ->redirectUrl($this->callbackUrl())
            ->redirect();
    }

    private function callbackUrl(): string
    {
        return config('services.google.redirect') ?: route('google.callback');
    }



    public function handleGoogleCallback(Request $request)
    {
        try {
            // Use normal (session-based) OAuth. `stateless()` can break verification flows
            // because the state/csrf handling is skipped. The redirect URL must match the
            // one used during the redirect step for the token exchange to succeed.
            $googleUser = Socialite::driver('google')
                ->redirectUrl($this->callbackUrl())
                ->user();

        } catch (\Throwable $e) {
            Log::error('Google OAuth callback failed', [
                'error' => $e->getMessage(),
            ]);

            return redirect()->route('login')
                ->with('error', 'Google sign-in failed.');
        }

        $email = $googleUser->getEmail();
        $name = $googleUser->getName() ?? $googleUser->getNickname() ?? 'Google User';

        if (!$email) {
            return redirect()->route('login')
                ->with('error', 'Google did not provide an email address.');
        }

        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            // Populate required fields with safe defaults.
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt(bin2hex(random_bytes(24))),
                'employee_id' => $request->input('employee_id') ?: 'google-' . bin2hex(random_bytes(4)),
                'department' => 'General',
                'phone' => null,
            ]);

        }


        // Ensure the user is authenticated using Laravel's session guard.
        // Use the standard Laravel session authentication flow.
        \Illuminate\Support\Facades\Auth::login($user, true);






        return redirect()->intended('/dashboard');
    }
}

