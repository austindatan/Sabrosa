<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Your Cart</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg w-fit">
    <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10 border-b pb-4 sm:pb-5 font-poppins">Your Cart</h2>

    @if(session('success'))
        <div 
          id="success-message"
          class="fixed bottom-4 right-4 bg-[#1f27a6] text-white px-6 py-3 rounded-lg shadow-md animate-slide-in z-50 flex items-center gap-3"
        >
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="white" class="size-6 text-white">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
          </svg>
          <span>{{ session('success') }}</span>
        </div>

        <style>
          @keyframes slide-in {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
          }
          .animate-slide-in {
            animation: slide-in 0.5s ease-out;
          }
        </style>

        <script>
          setTimeout(() => {
            const toast = document.getElementById("success-message");
            if (toast) toast.style.opacity = "0";
          }, 3000);
        </script>
        @endif

    @if(session('error'))
      <div id="error-message" class="bg-red-500 text-white px-4 py-2 rounded-md mb-4 text-center font-semibold transition-opacity duration-500">
        {{ session('error') }}
      </div>
      <script>
        setTimeout(() => {
          document.getElementById("error-message").style.opacity = "0";
        }, 3000);
      </script>
    @endif

    

    @if ($cartItems->isEmpty())
      <p class="text-center text-gray-500 mb-10">Your cart is empty.</p>
      <div class="text-center">
        <a href="{{ route('shop') }}" class="bg-pink-500 hover:bg-pink-600 text-white px-40 py-4 rounded text-md">Start Shopping</a>
      </div>
    @else
      <div class="hidden sm:grid grid-cols-12 font-thin text-gray-700 mb-5 text-xs font-poppins">
        <div class="col-span-6">PRODUCT</div>
        <div class="col-span-3 text-center">QUANTITY</div>
        <div class="col-span-3 text-right">TOTAL</div>
      </div>

      @php $grandTotal = 0; @endphp

      @foreach($cartItems as $item)
        @php
          $product = optional($item->productDetail->product);
          $total = $product->price * $item->quantity;
          $grandTotal += $total;
        @endphp

        <x-cart-item
          :cart_item_ID="$item->cart_item_ID"
          :image="asset($product->image_URL)"
          :name="$product->name"
          :priceText="'₱' . number_format($product->price)"
          :quantity="$item->quantity"
          :total="'₱' . number_format($total)"
        />
      @endforeach

      <div class="mt-8">
        <a href="{{ route('shop') }}" class="text-gray-700 underline text-base hover:text-black font-dm-sans">← Continue shopping</a>
      </div>

      <div class="mt-6 text-right text-xl sm:text-2xl font-bold font-poppins">
        Estimated Total: ₱{{ number_format($grandTotal) }}
      </div>

      <p class="text-right text-sm text-gray-500 mt-1 font-dm-sans">
        Taxes included. Discounts and shipping calculated at checkout.
      </p>

      <div class="flex justify-end mt-4">
        <a href="{{ route('delivery') }}" class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold text-md px-15 py-4 rounded transition duration-200">
          Continue to Checkout
        </a>
      </div>
    @endif
  </main>

  @include('pages.footer')

</body>
</html>