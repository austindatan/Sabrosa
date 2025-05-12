<!-- resources/views/pages/checkout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  @vite(['resources/js/app.js']) 
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg w-fit">
    
    <form action="{{ route('complete.purchase') }}" method="POST" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      @csrf

      {{-- LEFT SIDE --}}
      <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-right font-poppins">Review and Pay</h2>
        </div>

        <!-- Email -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start">
            <p class="col-span-3 text-lg text-gray-500 text-left">Email</p>
            <p class="col-span-9 text-lg font-medium text-gray-800 text-left">{{ optional($customer)->email ?? 'Not available' }}</p>
          </div>
        </div>

        <!-- Ship To -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start">
            <p class="col-span-3 text-lg text-gray-500 text-left">Ship to</p>
            <div class="col-span-9">
              <p class="text-lg font-medium text-gray-800 text-left">{{ optional($customer)->street ?? 'Street not found' }}</p>
              <p class="text-base text-gray-400 text-left">{{ optional($customer)->city ?? 'City not found' }}, {{ optional($customer)->province ?? 'Province not found' }}</p>
              <p class="text-base text-gray-400 text-left">{{ optional($customer)->country ?? 'Country not found' }}</p>
            </div>
          </div>
        </div>

        <!-- Delivery -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-center">
            <p class="col-span-3 text-lg text-gray-500 text-left">Delivery</p>
            <div class="col-span-6 text-left">
              <p class="text-lg font-semibold text-black" id="deliveryTitle">Standard Delivery</p>
              <p class="text-base text-gray-400" id="deliveryTime">Standard Priority <span class="text-sm text-gray-600">(+₱0)</span></p>
            </div>
            <div class="col-span-3 text-right">
              <select name="shipping_method_id" id="shippingDropdown" class="border rounded-lg p-2 text-lg text-gray-800 w-32">
                @foreach ($shippingMethods as $shipping)
                  <option 
                    value="{{ $shipping->shipping_ID }}"
                    data-method="{{ $shipping->shipping_method }}"
                    data-time="{{ $shipping->shipping_method == 'Standard' ? 'Standard Priority' : 'Highest Priority' }}"
                  >
                    {{ $shipping->shipping_method }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <!-- Payment Method -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4 flex items-center gap-2">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start flex-1">
            <p class="col-span-3 text-lg text-gray-500 text-left">Payment<br />Method</p>
            <div class="col-span-9 flex flex-col items-start gap-2">
              <div class="flex items-center gap-2">
                @if($paymentDetails && $paymentDetails->card_image)
                  <img src="{{ asset($paymentDetails->card_image) }}" alt="{{ $paymentDetails->name }}" class="flex-1 min-w-0 h-8 bg-white rounded-lg shadow-md flex items-center justify-center">
                @endif
                <p class="text-lg font-semibold text-gray-800 text-left">
                  {{ $paymentDetails->name ?? 'No Payment Method Selected' }}
                </p>
              </div>
              <p class="text-base text-gray-400 text-left">
                {{ optional($customer)->firstname }} {{ optional($customer)->lastname }}
              </p>
            </div>
          </div>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="block text-center w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded transition duration-200 font-dm-sans">Complete Purchase</button>
      </div>

      <!-- Toggle Order Summary Button (Mobile) -->
      <button
        type="button"
        id="toggle-order-summary"
        class="block lg:hidden bg-gray-100 p-6 rounded-lg order-1 lg:order-2 mb-0"
      >
        Toggle Order Summary
      </button>

      <!-- Order Summary -->
      <div
        id="orderSummary"
        class="bg-gray-100 p-6 rounded-lg order-1 lg:order-2 hidden lg:block mt-0"
      >
        <h2 class="text-xl font-dm-sans text-left">
          Your order from <span class="font-bold font-poppins mb-2">Sabrosa</span>
        </h2>

        <div class="space-y-4 font-dm-sans mt-4 mb-4">
          @foreach ($cartItems as $item)
            @php $product = optional($item->productDetail->product); @endphp
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3 relative">
                <div class="relative">
                  <img src="{{ asset($product->image_URL) }}" class="bg-white w-14 h-14 object-contain rounded border" />
                  <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">{{ $item->quantity }}</span>
                </div>
                <p class="text-sm text-left w-[150px]">{{ $product->name }}</p>
              </div>
              <p class="text-sm font-semibold">₱{{ number_format($product->price * $item->quantity) }}</p>
            </div>
          @endforeach
        </div>

        <div class="border-t pt-4 space-y-2">
          <div class="flex justify-between">
            <span class="font-poppins">Subtotal</span>
            <span class="font-dm-sans">₱{{ number_format($subtotal) }}</span>
          </div>
          <div class="flex justify-between mb-4">
            <span class="font-poppins">Shipping</span>
            <span class="font-dm-sans text-gray-500" data-shipping-amount>₱{{ number_format($shippingFee) }}</span>
          </div>
        </div>

        <div class="flex justify-between text-lg font-bold border-t pt-4">
          <span class="font-poppins">Total</span>
          <span class="font-poppins" data-total-amount>₱{{ number_format($totalAmount) }}</span>
        </div>

        <p class="text-sm text-gray-500 text-right font-dm-sans">
          Taxes included.
        </p>
      </div>
    </form>
  </main>

  @include('pages.footer')

  <!-- JavaScript to update shipping info -->
  <script>
    const dropdown = document.getElementById('shippingDropdown');
    const deliveryTitle = document.getElementById('deliveryTitle');
    const deliveryTime = document.getElementById('deliveryTime');
    const shippingAmountLabel = document.querySelector('[data-shipping-amount]');
    const totalAmountLabel = document.querySelector('[data-total-amount]');
    const baseSubtotal = {{ $subtotal }};
    const baseShipping = {{ $shippingFee }};

    function updateDeliveryInfo() {
      const selected = dropdown.options[dropdown.selectedIndex];
      const method = selected.getAttribute('data-method');
      const time = selected.getAttribute('data-time');
      const isPremium = method === 'Premium';
      const extraFee = isPremium ? 50 : 0;
      const totalShipping = baseShipping + extraFee;

      deliveryTitle.innerText = `${method} Delivery`;
      deliveryTime.innerHTML = `${time} <span class="text-sm text-gray-600">(+₱${extraFee})</span>`;
      shippingAmountLabel.innerText = `₱${totalShipping.toLocaleString()}`;
      totalAmountLabel.innerText = `₱${(baseSubtotal + totalShipping).toLocaleString()}`;
    }

    dropdown.addEventListener('change', updateDeliveryInfo);
    window.addEventListener('DOMContentLoaded', updateDeliveryInfo);
  </script>
</body>
</html>
