<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    // Fetch all payment methods
    public function index()
    {
        return response()->json(PaymentMethod::all());
    }

    // Fetch a specific payment method
    public function show($id)
    {
        return response()->json(PaymentMethod::findOrFail($id));
    }

    // Create a new payment method
    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|unique:payment_methods,payment_method'
        ]);

        $paymentMethod = PaymentMethod::create($request->all());

        return response()->json($paymentMethod, 201);
    }
}