<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|regex:/^[^@\\s]+@[^@\\s]+\\.[^@\\s]+$/',
            'password' => 'required',
        ], [
            'email.regex' => 'Adres e-mail musi mieć format user@example.com',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Update last login timestamp
            Auth::user()->update(['last_login_at' => now()]);
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Podane dane logowania są błędne.',
        ])->onlyInput('email');
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Show register form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle registration
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255|regex:/^[^@\\s]+@[^@\\s]+\\.[^@\\s]+$/',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'email.regex' => 'Adres e-mail musi mieć format user@example.com',
        ]);

        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role_id' => \App\Models\Role::where('name', 'user')->first()->id,
        ]);

        Auth::login($user);

        return redirect('/');
    }
}
