<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\CartItem;

class TransactionController extends Controller
{
    public function index()
    {
        $customer = Customer::where('user_account_ID', Auth::user()->user_account_ID)->first();
        $cartItems = CartItem::where('customer_ID', optional($customer)->customer_ID)
                    ->with('productDetail.product')
                    ->get();

        $subtotal = $cartItems->sum(fn($item) => optional($item->productDetail->product)->price * $item->quantity);
        $shippingFee = 254;
        $totalAmount = $subtotal + $shippingFee;
        $paymentDetails = optional($customer->paymentMethod);

        return view('transaction', compact('customer', 'cartItems', 'paymentDetails', 'subtotal', 'shippingFee', 'totalAmount'));
    }
    
}
