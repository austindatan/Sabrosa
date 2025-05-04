<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ManageUserController extends Controller
{
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,employee,admin,owner',
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('owner.dashboard')->with('success', 'Role updated successfully!');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('owner.dashboard')->with('success', 'User deleted successfully!');
    }
}
