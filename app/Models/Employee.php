<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employee';
    protected $primaryKey = 'employee_ID';
    public $timestamps = false;

    public function EmployeeDetails()
    {
        return $this->hasMany(EmployeeDetail::class, 'employee_ID', 'employee_ID');
    }
}
