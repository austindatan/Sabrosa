<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Models\CartItem;
use App\Models\Shipping;

class TransactionController extends Controller
{
    public function show($transaction_id)
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        // Get all cart_item_IDs from the orders associated with this transaction
        $cartItemIDs = DB::table('orders')
            ->where('transaction_id', $transaction_id)
            ->pluck('cart_item_ID');

        // Fetch only cart items that are part of this transaction
        $cartItems = CartItem::whereIn('cart_item_ID', $cartItemIDs)
            ->with('productDetail.product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'No items found for this transaction.');
        }

        // Get the shipping method used in this transaction
        $shippingID = DB::table('orders')
            ->where('transaction_id', $transaction_id)
            ->value('shipping_ID');

        $shipping = Shipping::findOrFail($shippingID);

        // Get payment method for the customer
        $paymentDetails = optional($customer->paymentMethod);

        // Get transaction token
        $transactionToken = DB::table('transaction')
            ->where('transaction_ID', $transaction_id)
            ->value('transaction_token');

        // Calculate subtotal and shipping fee
        $subtotal = $cartItems->sum(fn($item) =>
            optional($item->productDetail->product)->price * $item->quantity
        );

        $baseShipping = 50;
        $additionalFee = $shipping && $shipping->shipping_method === 'Premium' ? 50 : 0;
        $shippingFee = $baseShipping + $additionalFee;
        $totalAmount = $subtotal + $shippingFee;

        return view('transaction', compact(
            'customer',
            'cartItems',
            'paymentDetails',
            'subtotal',
            'shippingFee',
            'totalAmount',
            'shipping',
            'transactionToken'
        ));
    }
}
