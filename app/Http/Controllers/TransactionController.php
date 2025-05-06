<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\CartItem;
use App\Models\Shipping;  // Make sure this model exists and is properly defined

class TransactionController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_account_ID', Auth::user()->user_account_ID)->first();
        $cartItems = CartItem::where('customer_ID', optional($customer)->customer_ID)
                    ->with('productDetail.product')
                    ->get();

        // Calculate the subtotal and total amount
        $subtotal = $cartItems->sum(fn($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 254;  // You can adjust this based on logic or from the shipping method
        $totalAmount = $subtotal + $shippingFee;

        // Get payment method details
        $paymentDetails = optional($customer->paymentMethod);

        // Get the shipping method based on the customer's shipping_ID
        $shipping = Shipping::where('shipping_ID', $customer->shipping_ID)->first();  // Adjust the relation if necessary

        return view('transaction', compact('customer', 'cartItems', 'paymentDetails', 'subtotal', 'shippingFee', 'totalAmount', 'shipping'));
    }

    public function showTransactionSummary()
    {
        $customer = auth()->user()->customer;
        $shipping = $customer->shipping; // Assuming there's a relation defined to get the shipping details

        // Fetch other necessary data like cartItems, subtotal, etc.
        $cartItems = CartItem::where('customer_ID', $customer->customer_ID)
                    ->with('productDetail.product')
                    ->get();
        $subtotal = $cartItems->sum(fn($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 254;
        $totalAmount = $subtotal + $shippingFee;
        $paymentDetails = optional($customer->paymentMethod);

        return view('transaction', [
            'customer' => $customer,
            'shipping' => $shipping, // Pass shipping details to the view
            'cartItems' => $cartItems,
            'paymentDetails' => $paymentDetails,
            'subtotal' => $subtotal,
            'shippingFee' => $shippingFee,
            'totalAmount' => $totalAmount,
        ]);
    }
}
