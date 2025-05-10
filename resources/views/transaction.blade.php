<!-- resources/views/pages/transaction.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Transaction</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 text-gray-800 min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 max-w-5xl mx-auto bg-white border-2 border-[#E55182] rounded-lg shadow-lg p-6 sm:p-10 mt-[150px] mb-[100px] w-full">
    <h1 class="text-2xl sm:text-3xl font-bold font-poppins mb-6 text-center">Order Confirmation</h1>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 font-dm-sans">
      <!-- Left Column: Customer Details -->
      <div class="space-y-6">
        <div>
          <h2 class="text-xl font-semibold mb-2">Customer Information</h2>
          <p><span class="font-medium">Name:</span> {{ $customer->firstname }} {{ $customer->lastname }}</p>
          <p><span class="font-medium">Email:</span> {{ $customer->email }}</p>
        </div>

        <div>
          <h2 class="text-xl font-semibold mb-2">Shipping Address</h2>
          <p>{{ $customer->street }}</p>
          <p>{{ $customer->city }}, {{ $customer->province }}</p>
          <p>{{ $customer->country }}</p>
        </div>

        <div>
          <h2 class="text-xl font-semibold mb-2">Payment Method</h2>
          <p>{{ $paymentMethod->name ?? 'Not Available' }}</p>
        </div>

        <div>
          <h2 class="text-xl font-semibold mb-2">Delivery Method</h2>
          <p>{{ $shipping->shipping_method }} (Estimated: {{ $shipping->shipping_method == 'Standard' ? '5-7 Days' : '1-3 Days' }})</p>
        </div>
      </div>

      <!-- Right Column: Order Items -->
      <div class="bg-gray-50 p-6 rounded-lg border space-y-4">
        <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

        @foreach ($cartItems as $item)
          @php $product = optional($item->productDetail->product); @endphp
          <div class="flex items-center justify-between border-b pb-2">
            <div class="flex items-center gap-3">
              <img src="{{ asset($product->image_URL) }}" class="w-12 h-12 object-contain border rounded" />
              <div>
                <p class="font-medium">{{ $product->name }}</p>
                <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
              </div>
            </div>
            <p class="font-semibold">₱{{ number_format($product->price * $item->quantity) }}</p>
          </div>
        @endforeach

        <div class="border-t pt-4 space-y-2 text-sm">
          <div class="flex justify-between">
            <span>Subtotal</span>
            <span>₱{{ number_format($subtotal) }}</span>
          </div>
          <div class="flex justify-between">
            <span>Shipping</span>
            <span>₱{{ number_format($shippingFee) }}</span>
          </div>
        </div>

        <div class="flex justify-between text-lg font-bold border-t pt-4">
          <span>Total</span>
          <span>₱{{ number_format($total) }}</span>
        </div>
      </div>
    </div>
  </main>

  @include('pages.footer')
</body>
</html>
