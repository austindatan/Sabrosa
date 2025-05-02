<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Handle login request
    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if the credentials match the admin credentials
        if ($username === 'admin' && $password === '1234') {
            return view('pages.admindashboard');  // Redirect to admin dashboard view
        }

        // If not, show error and stay on login page
        return back()->withErrors([
            'login' => 'Invalid credentials',  // Error message
        ]);
    }
}
