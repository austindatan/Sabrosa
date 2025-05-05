<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;

class CartController extends Controller
{
    /**
     * Add a product to the customer's cart.
     */
    public function add(Request $request)
    {
        $request->validate([
            'product_details_ID' => 'required|exists:product_details,product_details_ID',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->first();

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not found.');
        }

        // Check if item already exists in cart
        $cartItem = CartItem::where([
            'customer_ID' => $customer->customer_ID,
            'product_details_ID' => $request->product_details_ID,
        ])->first();

        if ($cartItem) {
            $cartItem->increment('quantity', $request->quantity);
        } else {
            CartItem::create([
                'customer_ID' => $customer->customer_ID,
                'product_details_ID' => $request->product_details_ID,
                'quantity' => $request->quantity,
                'date_Added' => now(),
            ]);
        }

        return redirect()->back()->with('success', '✅ Item successfully added to cart!');
    }

    /**
     * Display the customer's cart contents.
     */
    public function show()
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::with(['productDetail.product'])
            ->where('customer_ID', $customer->customer_ID)
            ->get();

        return view('cart', ['cartItems' => collect($cartItems)]);
    }

    /**
     * Update the quantity of a cart item.
     */
    public function update(Request $request, CartItem $cartItem, $action)
    {
        if (!$cartItem) {
            return redirect()->back()->with('error', '❌ Cart item not found.');
        }

        if ($action === 'increase') {
            $cartItem->increment('quantity');
            return redirect()->back()->with('success', '✅ Item quantity increased.');
        } elseif ($action === 'decrease' && $cartItem->quantity > 1) {
            $cartItem->decrement('quantity');
            return redirect()->back()->with('success', '✅ Item quantity decreased.');
        }

        return redirect()->back()->with('error', '⚠️ Unable to update cart item.');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove(CartItem $cartItem)
    {
        if (!$cartItem) {
            return redirect()->back()->with('error', '❌ Cart item not found.');
        }

        $cartItem->delete();
        return redirect()->back()->with('success', '🗑️ Item successfully removed from cart.');
    }
}