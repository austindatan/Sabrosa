<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function showHome(): View
    {
        $featured = Product::inRandomOrder()
                    ->with('productDetail.store')
                    ->take(6)
                    ->get();

        return view('home', compact('featured'));
    }

    public function showShop(): View
    {
        $cookieProducts = Product::whereHas('productDetail.category', function ($q) {
            $q->where('name', 'Cookies');
        })->with('productDetail.store')->get();

        $donutProducts = Product::whereHas('productDetail.category', function ($q) {
            $q->where('name', 'Donuts');
        })->with('productDetail.store')->get();

        $cakeProducts = Product::whereHas('productDetail.category', function ($q) {
            $q->where('name', 'Cakes & Chocolates');
        })->with('productDetail.store')->get();

        $drinksProducts = Product::whereHas('productDetail.category', function ($q) {
            $q->where('name', 'Drinks & Tea');
        })->with('productDetail.store')->get();

        $mealProducts = Product::whereHas('productDetail.category', function ($q) {
            $q->where('name', 'Meals');
        })->with('productDetail.store')->get();

        $micProducts = Product::whereHas('productDetail.category', function ($q) {
            $q->where('name', 'We also have!');
        })->with('productDetail.store')->get();

        return view('shop', compact(
            'cookieProducts',
            'donutProducts',
            'cakeProducts',
            'drinksProducts',
            'mealProducts',
            'micProducts'
        ));
    }

    public function showAbout(): View
    {
        return view('about');
    }

    public function showContact(): View
    {
        return view('contact');
    }

    public function showCart()
    {
        $cartItems = session('cart', []);
        return view('cart', compact('cartItems'));
    }

    public function show(Product $product): View
    {
        $recommended = Product::where('product_ID', '!=', $product->product_ID)
                        ->inRandomOrder()
                        ->limit(2)
                        ->with('productDetail.store')
                        ->get();

        return view('product_views.product', compact('product', 'recommended'));
    }

    public function showOrderSummary(): View
    {
        $products = Product::select('name', 'price', 'quantity')->get();
        return view('delivery', compact('products'));
    }

    public function searchSuggestions(Request $request)
{
    $query = $request->get('query');

    $products = Product::where('name', 'like', '%' . $query . '%')
                ->select('name', 'image_URL')
                ->limit(6)
                ->get();

    return response()->json($products);
}
}
