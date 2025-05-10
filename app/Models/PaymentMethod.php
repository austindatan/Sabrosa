<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_method';

    protected $primaryKey = 'payment_method_ID';

    protected $fillable = ['payment_method', 'card_image']; 

    public $timestamps = false; 

    public function customers()
    {
        return $this->hasMany(Customer::class, 'payment_method_ID');
    }
}