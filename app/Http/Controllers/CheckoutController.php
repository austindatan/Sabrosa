<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Customer;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\Product;
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
            ->where('item_status', 'Pending')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $shippingMethods = Shipping::all();
        $paymentDetails = $customer->paymentMethod;
        $shippingFee = 50;

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
            ->where('item_status', 'Pending')
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

    public function storePaymentMethod(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|integer|min:1|max:6',
        ]);

        session(['selectedPaymentMethod' => $request->payment_method]);

        return redirect()->route('transaction')->with('success', 'Payment method saved.');
    }

    public function processTransaction($transaction_id)
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();


        $orderCartItemIDs = DB::table('orders')
            ->where('transaction_id', $transaction_id)
            ->pluck('cart_item_ID');

        $cartItems = CartItem::with(['productDetail.product'])
            ->whereIn('cart_item_ID', $orderCartItemIDs)
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'No items found for this transaction.');
        }

        $shippingID = DB::table('orders')->where('transaction_id', $transaction_id)->value('shipping_ID');
        $shipping = Shipping::findOrFail($shippingID);

        $paymentMethod = $customer->paymentMethod;

        $subtotal = $cartItems->sum(fn($item) =>
            optional($item->productDetail->product)->price * $item->quantity
        );

        $baseShipping = 50;
        $additionalFee = $shipping && $shipping->shipping_method === 'Premium' ? 50 : 0;
        $shippingFee = $baseShipping + $additionalFee;

        $total = $subtotal + $shippingFee;

        $transactionToken = DB::table('transaction')->where('transaction_ID', $transaction_id)->value('transaction_token');

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

    public function completePurchase(Request $request)
    {
        $user = Auth::user();
        $customer = Customer::where('user_account_ID', $user->user_account_ID)->firstOrFail();

        $cartItems = CartItem::where('customer_ID', $customer->customer_ID)
                            ->where('item_status', 'Pending')
                            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'shipping_method_id' => 'required|exists:shipping,shipping_ID',
        ]);

        $shipping = Shipping::findOrFail($request->shipping_method_id);

        session(['shipping_method_id' => $shipping->shipping_ID]);


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


            $productDetails = DB::table('product_details')
                                ->where('product_details_ID', $item->product_details_ID)
                                ->first();

            if (!$productDetails) {
                return redirect()->route('cart')->with('error', 'Product details not found.');
            }


            DB::table('product')
                ->where('product_ID', $productDetails->product_ID)
                ->decrement('stock_quantity', $item->quantity);
        }


        CartItem::where('customer_ID', $customer->customer_ID)
                ->where('item_status', 'Pending')
                ->update(['item_status' => 'Completed']);

        return redirect()->route('transaction', ['transaction_id' => $transactionID]);
    }
}
