<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    protected $table = 'employee_details';
    protected $primaryKey = 'employee_details_ID';
    public $timestamps = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_ID', 'employee_ID');
    }

    public function employee_positions()
    {
        return $this->belongsTo(Employee_Positions::class, 'employee_positions_ID', 'employee_positions_ID');
    }

    public function employee_account()
    {
        return $this->belongsTo(Employee_Account::class, 'employee_account_ID', 'employee_account_ID');
    }

}
