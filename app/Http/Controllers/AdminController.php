<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\EmployeeDetail;
use App\Models\Customer;

class AdminController extends Controller
{

    public function admin_dashboard() {
        return view('admin_side.admindashboard');
    }

    public function admin_productlist()
    {
        $products = ProductDetail::with(['product', 'category', 'store', 'supplier'])->get();

        return view('admin_side.productlist', compact('products'));
    }

    public function admin_addproduct() {
        return view('admin_side.addproduct');
    }

    public function admin_employees() 
    {
        $employees = EmployeeDetail::with(['employee', 'employee_positions', 'employee_account'])->get();

        return view('admin_side.employees', compact('employees'));
    }

    public function admin_addemployees() {
        return view('admin_side.addemployees');
    }

    public function admin_handleusers() 
    {
        $handleusers = Customer::all();

    return view('admin_side.handle_users', compact('handleusers'));
    }

    public function admin_handleorders() {
        return view('admin_side.handle_orders');
    }
}

