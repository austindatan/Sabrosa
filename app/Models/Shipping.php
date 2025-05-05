<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $table = 'shipping'; // Define correct table name

    protected $primaryKey = 'shipping_ID'; // Define primary key

    protected $fillable = ['shipping_method', 'delivery_time']; // Mass assignable fields
}
