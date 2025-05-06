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

        // ✅ Calculate totals
        $subtotal = $cartItems->sum(fn($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 50; // Example static shipping fee
        $totalAmount = $subtotal + $shippingFee;

        return view('delivery', compact('customer', 'cartItems', 'subtotal', 'shippingFee', 'totalAmount'));
    }

    /** ✅ Update Customer Information */
    public function update(Request $request)
    {
        // ✅ Validate input fields
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
            'payment_method_ID' => 'required|integer|in:1,2,3,4,5,6'
        ]);

        // ✅ Get the logged-in user's customer data
        $customer = Customer::where('user_account_ID', Auth::user()->user_account_ID)->firstOrFail();

        // ✅ Only update changed fields
        foreach ($validated as $key => $value) {
            if ($customer->$key !== $value) {
                $customer->$key = $value;
            }
        }

        $customer->save();

        return redirect()->route('delivery')->with('success', 'Your delivery info was updated successfully! 🚚✨');
    }

    public function updatePaymentMethod(Request $request)
    {
        $validated = $request->validate([
            'payment_method_ID' => 'required|exists:payment_method,payment_method_ID'
        ]);

        $customer = Customer::where('user_account_ID', Auth::user()->user_account_ID)->firstOrFail();
        $customer->payment_method_ID = $validated['payment_method_ID'];
        $customer->save();

        return redirect()->route('delivery')->with('success', 'Payment method updated successfully.');
    }
}
