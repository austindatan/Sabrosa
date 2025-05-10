@props(['cart_item_ID', 'image', 'name', 'priceText', 'quantity', 'total'])

<div class="px-4 sm:px-0">
  <div class="grid grid-cols-1 sm:grid-cols-12 items-center py-6 border-t border-gray-300 gap-y-4 sm:gap-x-12">

    <!-- Product Info -->
    <div class="col-span-1 sm:col-span-6 w-full flex flex-row items-center gap-4 sm:gap-6">
      <img src="{{ asset($image) }}" class="bg-gray-50 w-28 h-28 object-contain p-1 rounded-lg border mx-auto sm:mx-0" />
      <div class="w-full sm:max-w-[300px]">
        <p class="text-lg sm:text-xl font-dm-sans text-gray-800">{{ $name }}</p>
        <p class="text-gray-500 mt-1 font-poppins">{{ $priceText }}</p>
      </div>
    </div>

    <!-- Quantity Controls (Mobile) -->
    <div class="flex sm:hidden justify-between items-center w-full mt-2">
      <div class="flex items-center gap-2 flex-wrap">
        <!-- Decrease Quantity -->
        <form method="POST" action="{{ route('cart.update', ['cartItem' => $cart_item_ID, 'action' => 'decrease']) }}">
          @csrf
          <button type="submit" class="px-3 py-1.5 border border-gray-400 text-base font-bold hover:bg-gray-200">−</button>
        </form>

        <!-- Display Quantity -->
        <span class="text-lg font-bold">{{ $quantity }}</span>

        <!-- Increase Quantity -->
        <form method="POST" action="{{ route('cart.update', ['cartItem' => $cart_item_ID, 'action' => 'increase']) }}">
          @csrf
          <button type="submit" class="px-3 py-1.5 border border-gray-400 text-base font-bold hover:bg-gray-200">+</button>
        </form>

        <!-- Remove Item (Enhanced Button) -->
        <form method="POST" action="{{ route('cart.remove', ['cartItem' => $cart_item_ID]) }}">
          @csrf
          <button type="submit" class="text-red-500 text-xl hover:text-red-700 hover:bg-red-100 px-3 py-1.5 rounded-md transition duration-200 transform hover:scale-110" title="Remove">
            🗑️
          </button>
        </form>
      </div>
      <div class="font-semibold text-lg text-right font-poppins">{{ $total }}</div>
    </div>

    <!-- Quantity Controls (Desktop) -->
    <div class="hidden sm:flex sm:col-span-3 justify-center items-center gap-2 sm:gap-3 flex-wrap">
      <!-- Decrease Quantity -->
      <form method="POST" action="{{ route('cart.update', ['cartItem' => $cart_item_ID, 'action' => 'decrease']) }}">
        @csrf
        <button type="submit" class="px-3 py-1.5 border border-gray-400 text-base font-bold hover:bg-gray-200">−</button>
      </form>

      <!-- Display Quantity -->
      <span class="text-lg font-bold font-dm-sans">{{ $quantity }}</span>

      <!-- Increase Quantity -->
      <form method="POST" action="{{ route('cart.update', ['cartItem' => $cart_item_ID, 'action' => 'increase']) }}">
        @csrf
        <button type="submit" class="px-3 py-1.5 border border-gray-400 text-base font-bold hover:bg-gray-200">+</button>
      </form>

      <!-- Remove Item (Enhanced Button) -->
      <form method="POST" action="{{ route('cart.remove', ['cartItem' => $cart_item_ID]) }}">
        @csrf
        <button type="submit" class="text-red-500 text-xl hover:text-red-700 hover:bg-red-100 px-3 py-1.5 rounded-md transition duration-200 transform hover:scale-110" title="Remove">
          🗑️
        </button>
      </form>
    </div>

    <div class="hidden sm:block sm:col-span-3 text-right font-semibold text-lg sm:text-xl font-dm-sans">
      {{ $total }}
    </div>

  </div>
</div>