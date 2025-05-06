<!-- resources/views/transaction.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Transaction</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold mb-6 font-poppins">Transaction Summary</h1>

    <div class="text-left space-y-4 font-dm-sans">
      <p><strong>Email:</strong> {{ optional($customer)->email ?? 'N/A' }}</p>
      <p><strong>Shipping Address:</strong> {{ optional($customer)->street }}, {{ optional($customer)->city }}, {{ optional($customer)->province }}, {{ optional($customer)->country }}</p>
      <p><strong>Payment Method:</strong> {{ $paymentDetails->name ?? 'Not selected' }}</p>
    </div>

    <hr class="my-6">

    <h2 class="text-2xl font-semibold mb-4">Items Ordered</h2>
    <div class="space-y-4">
      @foreach ($cartItems as $item)
        @php $product = optional($item->productDetail->product); @endphp
        <div class="flex justify-between items-center">
          <div class="flex gap-4 items-center">
            <img src="{{ asset($product->image_URL) }}" alt="{{ $product->name }}" class="w-14 h-14 object-contain border rounded" />
            <div>
              <p class="font-semibold">{{ $product->name }}</p>
              <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
            </div>
          </div>
          <p class="font-semibold">₱{{ number_format($product->price * $item->quantity) }}</p>
        </div>
      @endforeach
    </div>

    <div class="mt-6 text-right space-y-2 font-poppins">
      <p><strong>Subtotal:</strong> ₱{{ number_format($subtotal) }}</p>
      <p><strong>Shipping:</strong> ₱{{ number_format($shippingFee) }}</p>
      <p class="text-xl font-bold"><strong>Total:</strong> ₱{{ number_format($totalAmount) }}</p>
    </div>
  </main>

  @include('pages.footer')
</body>
</html>