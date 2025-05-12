<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $table = 'cart_item';
    protected $primaryKey = 'cart_item_ID';
    public $timestamps = false;

    protected $fillable = [
        'customer_ID',
        'product_details_ID',
        'quantity',
        'date_Added',
        'item_status',
    ];

    /**
     * Get the customer that owns the cart item.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_ID', 'customer_ID');
    }

    /**
     * Get the product details associated with the cart item.
     */
    public function productDetail()
    {
        return $this->belongsTo(ProductDetail::class, 'product_details_ID', 'product_details_ID');
    }
}
