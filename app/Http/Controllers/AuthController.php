<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // ✅ Login Function
    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);

        // ✅ Check user in `user_account` table
        $user = DB::table('user_account')
                  ->where('email', $request->login)
                  ->orWhere('username', $request->login)
                  ->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Invalid credentials']);
        }

        // ✅ Manually authenticate user since it's in `user_account` table
        Auth::loginUsingId($user->user_account_ID);
        $request->session()->regenerate();

        return redirect()->route($user->role . '.dashboard');
    }

    // ✅ Register Function
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:user_account|max:255',
            'email' => 'required|email|unique:user_account|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        // ✅ Store new user in `user_account` table
        $userID = DB::table('user_account')->insertGetId([
            'username' => $request->username,
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::loginUsingId($userID);
        $request->session()->regenerate();

        return redirect()->route('user.dashboard');
    }

    // ✅ Logout Function (Enhanced Security)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }

    // ✅ Forgot Password Function
    public function resetPassword(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // ✅ Locate user in `user_account` table
        $user = DB::table('user_account')
                  ->where('email', $request->email)
                  ->where('username', $request->username)
                  ->first();

        if (!$user) {
            return back()->withErrors(['error' => 'No matching user found']);
        }

        // ✅ Hash & update password securely
        DB::table('user_account')
            ->where('email', $request->email)
            ->where('username', $request->username)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('forgot')->with('success', 'Your password has been successfully reset.');
    }
}