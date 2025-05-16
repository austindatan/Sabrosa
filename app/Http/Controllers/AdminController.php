<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;
use App\Models\EmployeeDetail;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Models\Category;
use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

   public function admin_dashboard()
{
    // Line Chart: Top Ordered Products by Quantity
        $topOrderedProducts = DB::table('orders')
            ->join('cart_item', 'orders.cart_item_ID', '=', 'cart_item.cart_item_ID')
            ->join('product_details', 'cart_item.product_details_ID', '=', 'product_details.product_details_ID')
            ->join('product', 'product_details.product_ID', '=', 'product.product_ID')
            ->join('transaction', 'orders.transaction_id', '=', 'transaction.transaction_id')
            ->where('transaction.status', 'Completed')
            ->select(
                DB::raw('MONTH(orders.date) as month'),
                'product.name as product_name',
                DB::raw('SUM(cart_item.quantity) as total_quantity')
            )
            ->groupBy(DB::raw('MONTH(orders.date)'), 'product.name')
            ->orderBy(DB::raw('MONTH(orders.date)'))
            ->get();

    // Pie Chart: Sales by Category (based only on completed transactions)
    $categorySales = DB::table('orders')
        ->join('cart_item', 'orders.cart_item_ID', '=', 'cart_item.cart_item_ID')
        ->join('product_details', 'cart_item.product_details_ID', '=', 'product_details.product_details_ID')
        ->join('product', 'product_details.product_ID', '=', 'product.product_ID')
        ->join('category', 'product_details.category_ID', '=', 'category.category_ID')
        ->join('transaction', 'orders.transaction_id', '=', 'transaction.transaction_id')
        ->where('transaction.status', 'Completed')
        ->select('category.name as category_name', DB::raw('SUM(cart_item.quantity) as total_quantity'))
        ->groupBy('category.name')
        ->get();

    // Admin Metrics
    $totalTransactions = DB::table('transaction')->count();
    $completedTransactions = DB::table('transaction')->where('status', 'Completed')->count();
    $pendingTransactions = DB::table('transaction')->where('status', 'Pending')->count();

    $totalRevenue = DB::table('orders')
        ->join('cart_item', 'orders.cart_item_ID', '=', 'cart_item.cart_item_ID')
        ->join('product_details', 'cart_item.product_details_ID', '=', 'product_details.product_details_ID')
        ->join('product', 'product_details.product_ID', '=', 'product.product_ID')
        ->join('transaction', 'orders.transaction_id', '=', 'transaction.transaction_id')
        ->where('transaction.status', 'Completed')
        ->select(DB::raw('SUM(product.price * cart_item.quantity) as revenue'))
        ->value('revenue');

    return view('admin_side.admindashboard', [
        'topOrderedProducts' => $topOrderedProducts,
        'categorySales' => $categorySales,
        'totalTransactions' => $totalTransactions,
        'completedTransactions' => $completedTransactions,
        'pendingTransactions' => $pendingTransactions,
        'totalRevenue' => $totalRevenue,
    ]);
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


    try {
    $product = \App\Models\Product::create([
        'name' => $validated['productName'],
        'description' => $validated['productDescription'] ?? null,
        'weight' => $validated['productWeight'] ?? null,
        'price' => $validated['productPrice'],
        'stock_quantity' => $validated['stockQuantity'] ?? 0,
        'image_URL' => $photo1Path,
        'image_display' => $photo2Path,
        'date_Added' => Carbon::now()->toDateString(),
    ]);
    } catch (\Exception $e) {
        dd('Error creating product:', $e->getMessage());
    }

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
        'employee_ID' => $employee->employee_ID, 
        'employee_positions_ID' => $validated['employee_positions_id'] ?? null, 
    ]);


    return redirect()->route('admin.addemployees')->with('success', 'Employee added successfully!');
    }

    public function admin_productdetail(Product $product)
    {
        $productDetails = ProductDetail::where('product_ID', $product->product_ID)->first();
        $categories = Category::all();
        $stores = Store::all();

        return view('admin_side.productdetail', compact('product', 'productDetails', 'categories', 'stores'));
    }

    public function updateProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $productDetail = ProductDetail::where('product_ID', $productId)->firstOrFail();

        
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity');

        
        if ($request->hasFile('image_URL')) {
            $file = $request->file('image_URL');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/product/product_sprites');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $product->image_URL = 'images/product/product_sprites/' . $filename;
        }

        if ($request->hasFile('image_display')) {
            $file = $request->file('image_display');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('images/product/product_display');

            if (!File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            $file->move($destination, $filename);
            $product->image_display = 'images/product/product_display/' . $filename;
        }

        $product->save();

        
        $productDetail->category_ID = $request->input('category_ID');
        $productDetail->store_ID = $request->input('store_ID');
        $productDetail->save();

        return redirect()->route('admin.productlist')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct($productId)
    {
        $product = Product::findOrFail($productId);

        
        ProductDetail::where('product_ID', $productId)->delete();

        $product->delete();

        return redirect()->route('admin.productlist')->with('success', 'Product deleted successfully.');
    }
}

