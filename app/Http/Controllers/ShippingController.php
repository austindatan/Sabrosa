<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shipping;

class ShippingController extends Controller
{

    public function index()
    {
        $shippingMethods = Shipping::all();
        return view('checkout', compact('shippingMethods'));
    }


    public function show($id)
    {
        return response()->json(Shipping::findOrFail($id));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'shipping_method_ID' => 'required|exists:shipping,shipping_ID',
        ]);

        $shipping = Shipping::findOrFail($id);
        $shipping->shipping_method_ID = $request->shipping_method_ID;
        $shipping->save();

        return response()->json([
            'message' => 'Shipping method updated successfully',
            'shipping' => $shipping,
        ]);
    }
}