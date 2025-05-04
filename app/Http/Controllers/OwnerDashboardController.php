<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OwnerDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure only authenticated users can access
    }

    public function index()
    {
        // Retrieve all users from the database
        $users = User::orderBy('id', 'asc')->get(); // Ensuring a consistent order

        return view('pages.ownerdashboard', compact('users'));
    }
}