<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MemberModel; // Assuming MemberModel is your user model

class AuthController extends Controller
{
    /**
     * Display the login form.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to authenticate using the credentials
        if (Auth::attempt($credentials)) {
            // Redirect to the intended page or default to the dashboard
            return redirect()->intended('/dashboard')->with('success', 'You are logged in.');
        }

        // Redirect back with an error message if authentication fails
        return back()->withErrors(['email' => 'Invalid credentials. Please try again.']);
    }

    /**
     * Handle logout request.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }
}