<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{

    public function index()
    {
        return response()->json(PaymentMethod::all());
    }


    public function show($id)
    {
        return response()->json(PaymentMethod::findOrFail($id));
    }


    public function store(Request $request)
    {
        $request->validate([
            'payment_method' => 'required|unique:payment_methods,payment_method'
        ]);

        $paymentMethod = PaymentMethod::create($request->all());

        return response()->json($paymentMethod, 201);
    }
}