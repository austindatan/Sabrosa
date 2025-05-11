<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;

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

        $shippingMethods = Shipping::all();
        $paymentDetails = $customer->paymentMethod;
        $shippingFee = 254;

        $subtotal = $cartItems->sum(fn($item) =>
            optional($item->productDetail->product)->price * $item->quantity
        );

        $totalAmount = $subtotal + $shippingFee;

        return view('checkout', compact(
            'customer',
            'cartItems',
            'shippingMethods',
            'paymentDetails',
            'subtotal',
            'shippingFee',
            'totalAmount'
        ));
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

        $subtotal = $cartItems->sum(fn($item) =>
            optional($item->productDetail->product)->price * $item->quantity
        );

        $shippingFee = 50;
        $totalAmount = $subtotal + $shippingFee;

        return view('delivery', compact(
            'customer',
            'cartItems',
            'subtotal',
            'shippingFee',
            'totalAmount'
        ));
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

    public function storePaymentMethod(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|integer|min:1|max:6',
        ]);

        session(['selectedPaymentMethod' => $request->payment_method]);

        return redirect()->route('transaction')->with('success', 'Payment method saved.');
    }

    public function processTransaction(Request $request)
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::with(['productDetail.product'])
            ->where('customer_ID', $customer->customer_ID)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $shippingMethodId = session('shipping_method_id');
        if (!$shippingMethodId) {
            return redirect()->route('checkout')->with('error', 'Shipping method not found.');
        }

        $shipping = Shipping::findOrFail($shippingMethodId);
        $paymentMethod = $customer->paymentMethod;

        $shippingFee = 254;
        $subtotal = $cartItems->sum(fn($item) =>
            optional($item->productDetail->product)->price * $item->quantity
        );
        $total = $subtotal + $shippingFee;

        $transactionToken = session('transaction_token');

        return view('transaction', compact(
            'customer',
            'cartItems',
            'shipping',
            'paymentMethod',
            'subtotal',
            'shippingFee',
            'total',
            'transactionToken'
        ));
    }

    public function process(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|integer|min:1|max:6',
            'shipping_address' => 'required|string',
        ]);

        return redirect()->route('home')->with('success', 'Checkout process placeholder—no order created yet!');
    }

    public function completePurchase(Request $request)
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::where('customer_ID', $customer->customer_ID)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'shipping_method_id' => 'required|exists:shipping,shipping_ID',
        ]);

        $shipping = Shipping::findOrFail($request->shipping_method_id);

        session(['shipping_method_id' => $shipping->shipping_ID]);

        // Generate token and store in session
        $transactionToken = strtoupper(bin2hex(random_bytes(5)));
        session(['transaction_token' => $transactionToken]);

        $transactionID = DB::table('transaction')->insertGetId([
            'date_added' => now(),
            'status' => 'Pending',
            'transaction_token' => $transactionToken,
        ]);

        foreach ($cartItems as $item) {
            DB::table('orders')->insert([
                'cart_item_ID' => $item->cart_item_ID,
                'shipping_ID' => $shipping->shipping_ID,
                'transaction_id' => $transactionID,
                'date' => now(),
            ]);
        }

        return redirect()->route('transaction');
    }
}
