<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class DeliveryController extends Controller
{

    public function update(Request $request)
    {
        $userId = Auth::id();

        $customer = Customer::where('user_account_ID', $userId)->first();
        if ($customer) {
            $customer->payment_method_ID = $request->payment_method_ID;
            $customer->save();
        }

        return redirect()->route('checkout')->with('success', 'Payment method updated successfully!');
    }
}
