<?php

// app/Http/Controllers/CustomerController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

        // ✅ Calculate totals
        $subtotal = $cartItems->sum(fn($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 50; // Example static shipping fee
        $totalAmount = $subtotal + $shippingFee;

        return view('delivery', compact('customer', 'cartItems', 'subtotal', 'shippingFee', 'totalAmount'));
    }
    
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('delivery', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'company' => 'required|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->only(['firstname', 'middlename', 'lastname', 'street', 'barangay', 'city', 'province', 'country', 'email', 'phone', 'company']));

        return redirect()->back()->with('success', 'Customer updated successfully!');
    }

}
