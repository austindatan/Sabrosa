<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_method'; // ✅ Ensures the correct table name

    protected $primaryKey = 'payment_method_ID'; // ✅ Defines the primary key

    protected $fillable = ['payment_method', 'card_image']; // ✅ Allows mass assignment for payment method & image

    public $timestamps = false; // ✅ If your table does NOT have `created_at` and `updated_at`, set this to false

    /**
     * Relationship with Customer
     * Each payment method may be associated with multiple customers.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class, 'payment_method_ID');
    }
}