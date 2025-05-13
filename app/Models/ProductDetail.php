<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
