<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\EmployeeDetail;
use App\Models\Customer;
use App\Models\User;
use App\Models\Product;
use App\Models\Transaction; 
use App\Models\Order;
use App\Models\CartItem;

class UserController extends Controller
{
    public function user_dashboard()
{
    $user = Auth::user();

    $customer = Customer::where('user_account_ID', $user->user_account_ID)->first();

    $products = DB::table('transaction')
        ->join('orders', 'transaction.transaction_id', '=', 'orders.transaction_id')
        ->join('cart_item', 'orders.cart_item_ID', '=', 'cart_item.cart_item_ID')
        ->join('product_details', 'cart_item.product_details_ID', '=', 'product_details.product_details_ID')
        ->join('product', 'product_details.product_ID', '=', 'product.product_ID')
        ->join('customer', 'cart_item.customer_ID', '=', 'customer.customer_ID')
        ->where('customer.user_account_ID', $user->user_account_ID)
        ->select(
            'product.product_ID',
            'product.name',
            'product.image_URL',
            'product.price',
            'cart_item.quantity',
            'transaction.transaction_id',
            'transaction.date_added',
            'transaction.status'
        )
        ->orderBy('transaction.date_added', 'desc')
        ->distinct()
        ->get();

    return view('user_side.userdashboard', compact('customer', 'products'));
}

    public function update(Request $request, $id)
    {
        $request->validate([
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'company' => 'nullable|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update($request->only([
            'street', 'barangay', 'city', 'province', 'country',
            'company'
        ]));

        return redirect()->route('user.dashboard')->with('success', 'Customer updated successfully!');
    }

    public function updateProfilePopup(Request $request, $id)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $customer = Customer::findOrFail($id);
        $customer->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully!');
    }

   public function change(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);


        $user = DB::table('user_account')
                  ->where('email', $request->email)
                  ->where('username', $request->username)
                  ->first();

        if (!$user) {
            return back()->withErrors(['error' => 'No matching user found']);
        }


        DB::table('user_account')
            ->where('email', $request->email)
            ->where('username', $request->username)
            ->update(['password' => Hash::make($request->password)]);

        return redirect()->route('user.dashboard')->with('success', 'Your password has been updated successfully.');
    }

    public function completeOrder($id)
    {
        $transaction = DB::table('transaction')->where('transaction_id', $id)->first();

        if ($transaction && $transaction->status !== 'Completed') {
            DB::table('transaction')
                ->where('transaction_id', $id)
                ->update(['status' => 'Completed']);
        }

        return redirect()->route('user.transactionHistory', $id)->with('success', 'Order marked as completed.');
    }

    public function transactionHistory($id)
{
    $user = Auth::user();

    $transaction = DB::table('transaction')->where('transaction_id', $id)->first();

    if (!$transaction) {
        return redirect()->route('user.dashboard')->withErrors('Transaction not found.');
    }

    $customer = Customer::where('user_account_ID', $user->user_account_ID)->first();

    $cartItems = DB::table('orders')
        ->join('cart_item', 'orders.cart_item_ID', '=', 'cart_item.cart_item_ID')
        ->join('product_details', 'cart_item.product_details_ID', '=', 'product_details.product_details_ID')
        ->join('product', 'product_details.product_ID', '=', 'product.product_ID')
        ->where('orders.transaction_id', $id)
        ->select('cart_item.quantity', 'product.name', 'product.image_URL', 'product.price')
        ->get();

    $subtotal = $cartItems->sum(function ($item) {
        return $item->price * $item->quantity;
    });

    $shipping = DB::table('orders')
        ->join('shipping', 'orders.shipping_ID', '=', 'shipping.shipping_ID')
        ->where('orders.transaction_id', $id)
        ->select('shipping.shipping_method')
        ->first();


    $baseShippingFee = 50;
    $shippingFee = $baseShippingFee + (
        ($shipping->shipping_method === 'Premium' || $shipping->shipping_method == 2) ? 50 : 0
    );

    $paymentMethod = DB::table('customer')
        ->join('payment_method', 'customer.payment_method_ID', '=', 'payment_method.payment_method_ID')
        ->where('customer.user_account_ID', $user->user_account_ID)
        ->select('payment_method.name')
        ->first();

    return view('user_side.user_transaction', compact(
        'transaction',
        'customer',
        'cartItems',
        'subtotal',
        'shipping',
        'shippingFee',
        'paymentMethod'
    ));
    }

    public function destroyAccount(Request $request)
    {
        $user = Auth::user(); // This is an instance of the User model

        // First, delete the related customer
        Customer::where('user_account_ID', $user->user_account_ID)->delete();

        // Log out and invalidate session
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Then delete the user account itself
        $user->delete();

        return redirect()->route('home')->with('status', 'Your account has been successfully deleted.');
    }

}