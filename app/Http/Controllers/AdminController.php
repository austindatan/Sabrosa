<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function admin_dashboard() {
        return view('admin_side.admindashboard');
    }

    public function admin_productlist() {
        return view('admin_side.productlist');
    }

    public function admin_addproduct() {
        return view('admin_side.addproduct');
    }

    public function admin_employees() {
        return view('admin_side.employees');
    }

    public function admin_addemployees() {
        return view('admin_side.addemployees');
    }

    public function admin_handleusers() {
        return view('admin_side.handle_users');
    }

    public function admin_handleorders() {
        return view('admin_side.handle_orders');
    }


}

