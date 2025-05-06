<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;

class CustomerController extends Controller
{

    public function show()
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        // ✅ Retrieve cart items linked to the customer
        $cartItems = CartItem::where('customer_ID', $customer->customer_ID)
                            ->with('productDetail.product')
                            ->get();

        // ✅ Calculate total values
        $subtotal = $cartItems->sum(fn($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 50; // Example static shipping fee
        $totalAmount = $subtotal + $shippingFee;

        return view('delivery', compact('customer', 'cartItems', 'subtotal', 'shippingFee', 'totalAmount'));
    }


    /** ✅ Update customer details */
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'street' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // ✅ Retrieve customer based on logged-in user
        $customer = Customer::where('user_account_ID', Auth::user()->user_account_ID)->firstOrFail();

        // ✅ Update only provided fields
        $customer->update($request->only(['first_name', 'last_name', 'email', 'street', 'phone']));

        return redirect()->route('delivery')->with('success', 'Your information has been updated.');
    }
}