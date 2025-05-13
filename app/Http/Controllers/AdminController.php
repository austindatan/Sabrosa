<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\EmployeeDetail;
use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

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

    public function storeProduct(Request $request)
    {
    $validated = $request->validate([
        'productPhoto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'productPhoto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'productName' => 'required|string|max:255',
        'productDescription' => 'nullable|string',
        'productWeight' => 'nullable|numeric',
        'productPrice' => 'required|numeric',
        'stockQuantity' => 'nullable|integer',
        'category_id' => 'nullable|integer',
        'store_id' => 'nullable|integer',
        'supplier_id' => 'nullable|integer',
    ]);

    // Handle image uploads with original filename + timestamp
    $photo1Path = null;
    $photo2Path = null;

    if ($request->hasFile('productPhoto1')) {
        $photo1 = $request->file('productPhoto1');
        $photo1Name = time() . '_' . $photo1->getClientOriginalName();
        $photo1->move(public_path('products'), $photo1Name);
        $photo1Path = 'products/' . $photo1Name;
    }

    if ($request->hasFile('productPhoto2')) {
        $photo2 = $request->file('productPhoto2');
        $photo2Name = time() . '_' . $photo2->getClientOriginalName();
        $photo2->move(public_path('products'), $photo2Name);
        $photo2Path = 'products/' . $photo2Name;
    }

    // Create product
    $product = \App\Models\Product::create([
        'name' => $validated['productName'],
        'description' => $validated['productDescription'] ?? null,
        'weight' => $validated['productWeight'] ?? null,
        'price' => $validated['productPrice'],
        'stock_Quantity' => $validated['stockQuantity'] ?? 0,
        'image_URL' => $photo1Path,
        'image_display' => $photo2Path,
        'date_Added' => Carbon::now()->toDateString(),
    ]);

    // Create product detail
    ProductDetail::create([
        'product_ID' => $product->product_ID,
        'category_id' => $validated['category_id'] ?? null,
        'store_id' => $validated['store_id'] ?? null,
        'supplier_id' => $validated['supplier_id'] ?? null,
    ]);

    return redirect()->route('admin.productlist')->with('success', 'Product added successfully!');
    }

    public function storeEmployees(Request $request)
    {
    $validated = $request->validate([
        'firstName' => 'required|string|max:255',
        'middleName' => 'nullable|string',
        'lastName' => 'nullable|string',
        'street' => 'required|string',
        'city' => 'nullable|string',
        'province' => 'nullable|string',
        'country' => 'nullable|string',
        'employee_positions_id' => 'nullable|integer',
    ]);

    $employee = \App\Models\Employee::create([
        'firstname' => $validated['firstName']??null,
        'middlename' => $validated['middleName'] ?? null,
        'lastname' => $validated['lastName'] ?? null,
        'street' => $validated['street']?? null,
        'city' => $validated['city'] ?? null,
        'province' => $validated['city'] ?? null,
        'country' => $validated['country'] ?? null,
    ]);

    EmployeeDetail::create([
        'employee_ID' => $employee->employee_ID, // use the value from the newly created employee
        'employee_positions_ID' => $validated['employee_positions_id'] ?? null, // fix key casing and spacing
    ]);


    return redirect()->route('admin.addemployees')->with('success', 'Employee added successfully!');
    }


}

