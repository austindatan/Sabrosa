<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'store';
    protected $primaryKey = 'store_ID';
    public $timestamps = false;

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'store_ID', 'store_ID');
    }
}
