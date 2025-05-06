<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_ID';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = false;
    protected $dateFormat = 'Y-m-d';

    // Mass-assignable fields
    protected $fillable = [
        'name',
        'price',
        'quantity',
        // add any other product fields here
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
}
