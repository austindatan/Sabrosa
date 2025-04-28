<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function showTropical(): View
    {
        $product = Product::findOrFail(1);
        return view('tropical', compact('product'));
    }

    public function showDon(): View
    {
        $product = Product::findOrFail(2);
        return view('don', compact('product'));
    }

    public function showBarbie(): View
    {
        $product = Product::findOrFail(3); 
        return view('barbie', compact('product'));
    }

    public function showBun(): View
    {
        $product = Product::findOrFail(4);  
        return view('bun', compact('product'));
    }

    public function showTea(): View
    {
         $product = Product::findOrFail(5); 
        return view('tea', compact('product'));
    }

    public function showSmores(): View
    {
        $product = Product::findOrFail(6); 
        return view('smores', compact('product'));
    }

    public function showHome(): View
    {
        return view('home');
    }
}