<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure the user is logged in
    }

    public function updateRole(Request $request, $id)
    {
        // Validate role selection
        $request->validate([
            'role' => 'required|in:user,employee,admin,owner',
        ]);

        // Find user and update role
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('owner.dashboard')->with('success', 'Role updated successfully!');
    }

    public function deleteUser($id)
    {
        // Find user and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('owner.dashboard')->with('success', 'User deleted successfully!');
    }
}