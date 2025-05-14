<?php

// app/Models/Transaction.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction'; // If you want to be explicit

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;

    // Define any relationships later here (e.g. hasMany Orders)
}

