<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class OwnerDashboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('user_account_ID', 'asc')->get();
        return view('pages.ownerdashboard', compact('users'));
    }
}
