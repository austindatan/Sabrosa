<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_ID';
    public $timestamps = false;

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'category_ID', 'category_ID');
    }
}
