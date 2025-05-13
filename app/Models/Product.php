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


}
