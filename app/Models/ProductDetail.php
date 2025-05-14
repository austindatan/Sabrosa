<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductDetail extends Model
{
    protected $table = 'product_details';
    protected $primaryKey = 'product_details_ID';
    public $timestamps = false;

    protected $fillable = ['name', 'price', 'product_ID', 'category_id', 'store_id', 'supplier_id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_ID', 'product_ID');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_ID', 'category_ID');
    }

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_ID', 'store_ID');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_ID', 'supplier_ID');
    }

    public function orderHistory()
    {
        $userId = Auth::id();

        $products = DB::table('transaction')
            ->join('orders', 'transaction.transaction_id', '=', 'orders.transaction_id')
            ->join('cart_item', 'orders.cart_item_ID', '=', 'cart_item.cart_item_ID')
            ->join('product_detail', 'cart_item.product_details_ID', '=', 'product_detail.product_details_ID')
            ->join('product', 'product_detail.product_ID', '=', 'product.product_ID')
            ->join('customer', 'cart_item.customer_ID', '=', 'customer.customer_ID')
            ->where('customer.user_account_ID', $userId)
            ->select(
                'product.product_ID',
                'product.name',
                'product.image_URL',
                'product.price'
            )
            ->distinct()
            ->get();

        return view('user_side.userdashboard', compact('products'));
    }
}
