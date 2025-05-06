<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::with(['productDetail.product'])
            ->where('customer_ID', $customer->customer_ID)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $grandTotal = $cartItems->sum(fn ($item) => optional($item->productDetail->product)->price * $item->quantity);

        return view('checkout', compact('cartItems', 'grandTotal'));
    }

    public function showDeliveryPage()
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::with(['productDetail.product'])
            ->where('customer_ID', $customer->customer_ID)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum(fn ($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 50;
        $totalAmount = $subtotal + $shippingFee;

        return view('delivery', compact('customer', 'cartItems', 'subtotal', 'shippingFee', 'totalAmount'));
    }

    public function updateCustomer(Request $request)
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name'  => 'required|string|max:100',
            'email'      => 'required|email|max:255',
        ]);

        $customer->update($validated);

        return redirect()->route('delivery')->with('success', 'Customer info updated successfully.');
    }

    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        return redirect()->route('home')->with('success', 'Checkout process placeholder—no order created yet!');
    }
}
