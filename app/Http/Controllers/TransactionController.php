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


        $cartItemIDs = DB::table('orders')
            ->where('transaction_id', $transaction_id)
            ->pluck('cart_item_ID');


        $cartItems = CartItem::whereIn('cart_item_ID', $cartItemIDs)
            ->with('productDetail.product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'No items found for this transaction.');
        }


        $shippingID = DB::table('orders')
            ->where('transaction_id', $transaction_id)
            ->value('shipping_ID');

        $shipping = Shipping::findOrFail($shippingID);


        $paymentDetails = optional($customer->paymentMethod);


        $transactionToken = DB::table('transaction')
            ->where('transaction_ID', $transaction_id)
            ->value('transaction_token');


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
