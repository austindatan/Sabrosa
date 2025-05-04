<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function showHome(): View
    {
        return view('home');
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

    public function show(Product $product): View
    {
        return view('product_views.product', compact('product'));
    }
}
