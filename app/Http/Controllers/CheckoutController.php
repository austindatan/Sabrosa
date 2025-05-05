<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;

class CheckoutController extends Controller
{
    /**
     * Show the checkout page.
     */
    public function index()
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::with(['productDetail.product'])
            ->where('customer_ID', $customer->customer_ID)
            ->get();

        // Ensure the cart has items before proceeding to checkout
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        // Calculate total price
        $grandTotal = $cartItems->sum(function ($item) {
            return optional($item->productDetail->product)->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'grandTotal'));
    }

    /**
     * Placeholder for future checkout processing.
     */
    public function process(Request $request)
    {
        // No order model yet, so we just validate input
        $request->validate([
            'payment_method' => 'required|string',
            'shipping_address' => 'required|string',
        ]);

        return redirect()->route('home')->with('success', 'Checkout process placeholder—no order created yet!');
    }
}