<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // ✅ Match the exact table name
    protected $table = 'customer';

    // ✅ Set the primary key
    protected $primaryKey = 'customer_ID';

    // ✅ Disable timestamps if your table lacks them
    public $timestamps = false;

    // ✅ Mass-assignable fields
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
        'email',
        'phone', 
        'company',
        'payment_method_ID' // Include this if the field exists in your table
    ];

    // ✅ Relationships
    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_ID');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_account_ID');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'customer_ID');
    }
}
