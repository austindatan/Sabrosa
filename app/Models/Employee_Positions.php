<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee_Positions extends Model
{
    protected $table = 'employee_positions';
    protected $primaryKey = 'employee_positions_ID';
    public $timestamps = false;

    public function EmployeeDetails()
    {
        return $this->hasMany(EmployeeDetail::class, 'employee_positions_ID', 'employee_positions_ID');
    }
}
