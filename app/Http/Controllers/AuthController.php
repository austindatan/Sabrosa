<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Handle login request
    public function login(Request $request)
    {
        // Validate input
        $request->validate([
            'login' => 'required', // Can be either username or email
            'password' => 'required',
        ]);

        // Attempt to find user by email or username
        $user = User::where('email', $request->login)
                    ->orWhere('username', $request->login)
                    ->first();

        // Validate user and password
        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Invalid credentials']);
        }

        // Authenticate user
        Auth::login($user);
        $request->session()->regenerate(); // Regenerates session for security

        // Redirect based on role
        return redirect()->route($user->role . '.dashboard');
    }

    public function register(Request $request)
    {
        // Validate registration data
        $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create user with default role as 'user'
        $user = User::create([
            'username' => $request->username, // This stores the entered username
            'name' => $request->username, // Assign the username to 'name' as well if needed
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password securely
            'role' => 'user', // Default role
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard'); // Redirect new users to the user dashboard
    }

    // Handle logout request
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
} 
