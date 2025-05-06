<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_Account extends Model
{
    protected $table = 'employee_account';
    protected $primaryKey = 'employee_account_ID';
    public $timestamps = false;

    public function EmployeeDetails()
    {
        return $this->hasMany(EmployeeDetail::class, 'employee_account_ID', 'employee_account_ID');
    }
}
