<?php

// app/Models/Customer.php
namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'customer_ID';
    public $timestamps = false;

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
        'payment_method_ID',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_account_ID');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class, 'customer_ID');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'payment_method_ID', 'payment_method_ID');
    }
}
