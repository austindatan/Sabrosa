<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function updateRole(Request $request, $user_account_ID)
    {
        $request->validate([
            'role' => 'required|in:user,employee,admin,owner',
        ]);

        $user = User::where('user_account_ID', $user_account_ID)->firstOrFail();
        $user->role = $request->role;
        $user->save();

        return redirect()->route('owner.dashboard')->with('success', 'Role updated successfully!');
    }

    public function deleteUser($user_account_ID)
    {
        $user = User::where('user_account_ID', $user_account_ID)->firstOrFail();
        $user->delete();

        return redirect()->route('owner.dashboard')->with('success', 'User deleted successfully!');
    }
}
