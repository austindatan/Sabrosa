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
use App\Models\CartItem;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{

   public function admin_dashboard()
{
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

    public function admin_handleorders(Request $request)
    {
        // Dashboard cards
        $pendingOrder = Transaction::where('status', 'Pending')->count();
        $completed    = Transaction::where('status', 'Completed')->count();

        // Build base query
        $q = DB::table('transaction as t')
            ->join('orders as o',           't.transaction_id', '=', 'o.transaction_id')
            ->join('cart_item as ci',       'o.cart_item_ID',    '=', 'ci.cart_item_ID')
            ->join('product_details as pd', 'ci.product_details_ID', '=', 'pd.product_details_ID')
            ->join('product as p',          'pd.product_ID',     '=', 'p.product_ID')
            ->join('customer as c',         'ci.customer_ID',    '=', 'c.customer_ID')
            ->join('shipping as s',         'o.shipping_ID',     '=', 's.shipping_ID')
            ->select([
                't.transaction_token',
                DB::raw("CONCAT(c.firstname, ' ', c.lastname) AS customer_name"),
                't.date_added',
                't.status',
                DB::raw(
                    'SUM(ci.quantity * p.price)'
                    . ' + (50 + CASE WHEN s.shipping_method = "Premium" THEN 50 ELSE 0 END)'
                    . ' AS total_price'
                )
            ])
            ->groupBy(
                't.transaction_token',
                'customer_name',
                't.date_added',
                't.status',
                's.shipping_method'
            );

        // 1) Keyword search
        if ($search = $request->input('search')) {
            $q->havingRaw('(customer_name LIKE ? OR t.transaction_token LIKE ?)', ["%{$search}%", "%{$search}%"]);
        }

        // 2) Status filter
        if ($status = $request->input('status')) {
            $q->having('t.status', '=', $status);
        }

        // 3) Sorting
        switch ($request->input('sort')) {
            case 'date_asc':
                $q->orderBy('t.date_added', 'asc');
                break;
            case 'date_desc':
                $q->orderBy('t.date_added', 'desc');
                break;
            case 'name_asc':
                $q->orderBy('customer_name', 'asc');
                break;
            case 'name_desc':
                $q->orderBy('customer_name', 'desc');
                break;
            case 'price_asc':
                $q->orderBy('total_price', 'asc');
                break;
            case 'price_desc':
                $q->orderBy('total_price', 'desc');
                break;
            default:
                // default newest first
                $q->orderBy('t.date_added', 'desc');
        }

        $orders = $q->get();

        return view('admin_side.handle_orders', compact(
            'pendingOrder',
            'completed',
            'orders'
        ));
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

