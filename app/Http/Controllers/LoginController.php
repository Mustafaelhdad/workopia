<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request): View
    {
        return view("auth.login");
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate(['email' => 'required|string|email|max:100', 'password' => 'required|string']);

        if (Auth::attempt($credentials)) {
            // regenerate the session to prevent fixation attacks
            return redirect()->intended(route('home'))->with('success', 'You are now logged in!');
        }

        // if auth fails, redirect back with error
        return back()->withErrors(['email' => 'The provided credentials are invalid'])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
