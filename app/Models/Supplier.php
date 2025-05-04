<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'supplier_ID';
    public $timestamps = false;

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'supplier_ID', 'supplier_ID');
    }
}
