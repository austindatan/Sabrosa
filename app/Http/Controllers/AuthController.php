<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // Update to match the 'user_account' table
        $user = User::where('email', $request->login)
                    ->orWhere('username', $request->login)
                    ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Invalid credentials']);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route($user->role . '.dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user_account|max:255',
            'email' => 'required|email|unique:user_account|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // Update to match the 'user_account' table
        $user = User::create([
            'username' => $request->username, 
            'name' => $request->username, // You can adjust this if 'name' isn't intended to be the username
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // You can change the default role if needed
        ]);

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard'); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
