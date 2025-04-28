<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_ID';
    public $timestamps = false; 
    protected $dateFormat = 'Y-m-d'; 
}