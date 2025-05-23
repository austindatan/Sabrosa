<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_ID';
    public $timestamps = false;

    protected $fillable = [
        'cart_item_ID',
        'shipping_ID',
        'date',
    ];

    public function cartItem()
    {
        return $this->belongsTo(CartItem::class, 'cart_item_ID');
    }

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
