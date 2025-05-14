<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\EmployeeDetail;
use App\Models\Customer;



class UserController extends Controller
{
    public function user_dashboard()
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->first();

        return view('user_side.userdashboard', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->only([
            'street', 'barangay', 'city', 'province', 'country',
            'company'
        ]));

        return redirect()->route('user.dashboard')->with('success', 'Customer updated successfully!');
    }

    public function updateProfilePopup(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
    }

   public function change(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        // ✅ Locate user
        $user = DB::table('user_account')
                  ->where('email', $request->email)
                  ->where('username', $request->username)
                  ->first();

        if (!$user) {
            return back()->withErrors(['error' => 'No matching user found']);
        }

        // ✅ Update password
        DB::table('user_account')
            ->where('email', $request->email)
            ->where('username', $request->username)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('user.dashboard')->with('success', 'Your password has been updated successfully.');
    }

}