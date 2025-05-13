<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; 

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_ID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';

    protected $fillable = [
    'name',
    'description',
    'weight',
    'price',
    'quantity',
    'image_URL',
    'image_display',
    'date_Added',
    ];

    // Relationship to ProductDetail
    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class, 'product_ID', 'product_ID');
    }

    // Ensure route binding uses correct primary key
    public function getRouteKeyName()
    {
        return 'product_ID';
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function storeProduct(Request $request)
    {
    $validated = $request->validate([
        'productPhoto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'productPhoto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'productName' => 'required|string|max:255',
        'productDescription' => 'nullable|string',
        'productWeight' => 'nullable|numeric',
        'productPrice' => 'required|numeric',
        'stockQuantity' => 'nullable|integer',
    ]);

    // Handle image uploads
    $photo1Path = $request->file('productPhoto1')?->store('products', 'public');
    $photo2Path = $request->file('productPhoto2')?->store('products', 'public');

    // Step 1: Create the product
    $product = Product::create([
        'name' => $validated['productName'],
        'description' => $validated['productDescription'] ?? null,
        'weight' => $validated['productWeight'] ?? null,
        'price' => $validated['productPrice'],
        'quantity' => $validated['stockQuantity'] ?? 0,
        'image_URL' => $photo1Path,
        'image_display' => $photo2Path,
        'date_Added' => Carbon::now()->toDateString(),
    ]);

    // Step 2: Connect product_details via foreign key
    ProductDetail::create([
        'product_ID' => $product->product_ID,
        'category_id' => $validated['category_id'] ?? null,
        'store_id' => $validated['store_id'] ?? null,
        'supplier_id' => $validated['supplier_id'] ?? null,
    ]);

    return redirect()->route('admin.productlist')->with('success', 'Product added successfully!');
    }

}
