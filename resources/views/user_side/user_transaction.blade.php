<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
  <script>
    function showConfirmation() {
      document.getElementById('confirmationModal').classList.remove('hidden');
    }

    function hideConfirmation() {
      document.getElementById('confirmationModal').classList.add('hidden');
    }
  </script>
</head>
<body class="bg-pink-100 text-gray-800 min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 max-w-5xl mx-auto bg-white border-2 border-[#E55182] rounded-lg shadow-lg p-6 sm:p-10 mt-[150px] mb-[100px] w-full">
    <h1 class="text-2xl sm:text-3xl font-bold font-poppins mb-2 text-center">Transaction Details</h1>

    <!-- Transaction Token & Status -->
    <div class="text-center mb-6 space-y-2">
      <p class="inline-block px-4 py-2 bg-yellow-100 text-yellow-900 border border-yellow-300 rounded-lg text-sm font-semibold">
        Transaction Token: {{ $transaction->transaction_token ?? 'N/A' }}
      </p>
      <p class="text-sm text-gray-600">Status: 
        <span class="font-bold {{ $transaction->status == 'Completed' ? 'text-green-600' : 'text-red-600' }}">
          {{ $transaction->status }}
        </span>
      </p>
    </div>

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
          <p>
            {{ $shipping->shipping_method }} 
            (Estimated: {{ $shipping->shipping_method == 'Standard' ? 'Standard Priority' : 'Highest Priority' }})
          </p>
        </div>
      </div>

      <!-- Right Column: Order Items -->
      <div class="bg-gray-50 p-6 rounded-lg border space-y-4">
        <h2 class="text-xl font-semibold mb-4">Order Summary</h2>

        @foreach ($cartItems as $item)
          <div class="flex items-center justify-between border-b pb-2">
            <div class="flex items-start gap-3">
              <img src="{{ asset($item->image_URL) }}" class="w-12 h-12 object-contain border rounded" />
              <div class="flex flex-col">
                <p class="font-medium break-words max-w-[180px]">{{ $item->name }}</p>
                <p class="text-sm text-gray-500">Quantity: {{ $item->quantity }}</p>
              </div>
            </div>
            <p class="font-semibold whitespace-nowrap">₱{{ number_format($item->price * $item->quantity) }}</p>
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
          <span>₱{{ number_format($subtotal + $shippingFee) }}</span>
        </div>

        @if ($transaction->status !== 'Completed')
          <button onclick="showConfirmation()" class="mt-6 w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-lg font-semibold">
            Complete Order
          </button>
        @endif
      </div>
    </div>
  </main>

  <!-- Confirmation Modal -->
  <div id="confirmationModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg max-w-sm w-full">
      <h2 class="text-lg font-semibold mb-4">Confirm Changes</h2>
      <p class="mb-6">Are you sure you want to mark this order as <strong>Completed</strong>?</p>
      <div class="flex justify-end space-x-3">
        <button onclick="hideConfirmation()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded">No</button>
        <form action="{{ route('user.completeOrder', $transaction->transaction_id) }}" method="POST">
          @csrf
          <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded">Yes</button>
        </form>
      </div>
    </div>
  </div>

  @include('pages.footer')
</body>
</html>
