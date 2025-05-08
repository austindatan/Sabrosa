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

    <!-- ✅ Success & Error Messages -->
    @if(session('success'))
      <div id="success-message" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center font-semibold transition-opacity duration-500">
        {{ session('success') }}
      </div>
      <script>
        setTimeout(() => {
          document.getElementById("success-message").style.opacity = "0";
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