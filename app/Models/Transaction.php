<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';

    protected $primaryKey = 'transaction_id';

    public $timestamps = false;


}

