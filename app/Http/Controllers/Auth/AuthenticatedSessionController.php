<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
            'remember' => ['nullable', 'boolean'],
        ], [
            'login.required' => 'Email atau nama akun wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $remember = (bool) ($credentials['remember'] ?? false);
        $login = trim($credentials['login']);

        $attempted = filter_var($login, FILTER_VALIDATE_EMAIL)
            ? ['email' => $login, 'password' => $credentials['password']]
            : ['name' => $login, 'password' => $credentials['password']];

        if (! Auth::attempt($attempted, $remember)) {
            throw ValidationException::withMessages([
                'login' => 'Email/nama akun atau password tidak cocok.',
            ]);
        }

        $request->session()->regenerate();

        $user = $request->user();

        if ($user?->isJamaat()) {
            return redirect()->route('jamaat.dashboard');
        }

        return redirect()->intended(url('/admin'));
    }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function dashboardRedirect(Request $request): RedirectResponse
    {
        $user = $request->user();

        if ($user?->isJamaat()) {
            return redirect()->route('jamaat.dashboard');
        }

        return redirect()->to('/admin');
    }
}
