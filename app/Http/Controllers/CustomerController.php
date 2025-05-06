<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;

class CustomerController extends Controller
{

    /** ✅ Show Delivery Page with Customer Data */
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

    /** ✅ Update Customer Information */
    public function update(Request $request)
    {
        // ✅ Validate inputs before updating
        $validated = $request->validate([
            'firstname' => 'required|string|max:100',
            'middlename' => 'nullable|string|max:100',
            'lastname' => 'required|string|max:100',
            'street' => 'nullable|string|max:100',
            'barangay' => 'nullable|string|max:100',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'country' => 'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:100',
            'payment_method_ID' => 'nullable|integer'
        ]);

        // ✅ Retrieve customer for logged-in user
        $customer = Customer::where('user_account_ID', Auth::user()->user_account_ID)->firstOrFail();

        // ✅ Update ONLY modified fields
        $customer->update(array_filter($validated));

        return redirect()->route('delivery')->with('success', 'Your information has been updated.');
    }
}