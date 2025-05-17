<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;

    public function orders()
    {
        return $this->hasMany(Order::class, 'transaction_id');
    }

    public function customer()
    {
        return $this->hasOneThrough(Customer::class, Order::class, 'transaction_id', 'customer_ID', 'transaction_id', 'customer_ID');
    }

}

