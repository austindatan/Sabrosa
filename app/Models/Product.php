<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_ID';
    public $timestamps = false;
    public $incrementing = true; // or false if product_ID is not auto-increment
    protected $keyType = 'int'; // or 'string' if product_ID is a string
    protected $dateFormat = 'Y-m-d';

    public function productDetail()
    {
        return $this->hasOne(ProductDetail::class, 'product_ID', 'product_ID');
    }

    public function getRouteKeyName()
    {
        return 'product_ID';
    }
}
