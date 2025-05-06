<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer'; // Ensure it matches your database table name

    protected $primaryKey = 'customer_ID'; // Define the primary key

    public $timestamps = false; // If your table doesn't have created_at & updated_at

    protected $fillable = [
        'user_account_ID', 
        'firstname', 
        'middlename', 
        'lastname', 
        'street', 
        'barangay',
        'city', 
        'province', 
        'country', 
        'email'
    ];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_ID');
    }
}