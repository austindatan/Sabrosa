<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | {{ $product->name }} </title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header', ['product' => $product])

  <main class="flex-1">
    <div class="flex flex-col lg:flex-row gap-10 px-4 sm:px-6 md:px-10 py-10 max-w-[1440px] mx-auto mt-[75px]">
      <div class="flex-1 flex flex-col gap-4 items-center lg:items-start">
        <img src="{{ asset($product->image_display) }}" alt="{{ $product->name }}" class="w-full max-h-[1000px] object-contain">
      </div>

      <!-- Right: Product Info -->
      <div class="flex-1 flex flex-col gap-2">
        <div class="flex flex-wrap justify-between items-center w-full mt-4 gap-4">
          <div class="flex items-center justify-start gap-2 border-2 border-pink-300 rounded-full px-4 py-1 bg-white">
            <span class="text-pink-500 text-xl">★★★★★</span>
            <span class="text-gray-700 font-semibold">({{ $product->ratings_count ?? 778 }})</span>
          </div>

          <div>
            <img src="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}" class="w-[80px] sm:w-[100px] object-contain invert">
          </div>
        </div>

        <div class="flex flex-row flex-wrap justify-between items-center w-full mt-4 gap-4">
          <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-gray-900 leading-tight text-left font-dm-sans flex-1 min-w-[200px]">
            {{ $product->name }}
          </h2>

          <div class="bg-pink-400 text-white text-xl sm:text-2xl px-6 py-3 rounded-2xl font-barlow whitespace-nowrap">
            ₱{{ $product->price }}
          </div>
        </div>


        @if(session('success'))
        <div 
          id="success-toast"
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
            const toast = document.getElementById("success-toast");
            if (toast) toast.style.opacity = "0";
          }, 3000);
        </script>
        @endif

        <form method="POST" action="{{ route('cart.add') }}" class="flex flex-col sm:flex-row items-stretch gap-4 mt-6">
          @csrf
          <input type="hidden" name="product_details_ID" value="{{ $product->productDetail->product_details_ID }}">
          <input type="hidden" id="quantity_input" name="quantity" value="1">

          <div class="w-full sm:w-40 flex items-center border-2 border-pink-300 rounded-xl overflow-hidden text-lg font-semibold bg-white">
            <button type="button" id="decrement" class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">−</button>
            <span id="quantity_display" class="w-1/3 text-center py-2">1</span>
            <button type="button" id="increment" class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">+</button>
          </div>

          <button type="submit" class="flex-1 bg-pink-400 text-white text-lg font-dm-sans px-8 py-3 rounded-xl hover:bg-pink-500 transition">
            Add to Shopping Cart
          </button>
        </form>

        <script>
          document.addEventListener("DOMContentLoaded", () => {
              const quantityDisplay = document.getElementById("quantity_display");
              const quantityInput = document.getElementById("quantity_input");
              const increment = document.getElementById("increment");
              const decrement = document.getElementById("decrement");

              increment.addEventListener("click", () => {
                  let val = parseInt(quantityDisplay.textContent);
                  quantityDisplay.textContent = ++val;
                  quantityInput.value = val;
              });

              decrement.addEventListener("click", () => {
                  let val = parseInt(quantityDisplay.textContent);
                  if (val > 1) {
                      quantityDisplay.textContent = --val;
                      quantityInput.value = val;
                  }
              });
          });
        </script>

        <!-- Description -->
        <div class="gap-6">
          <h3 class="text-lg font-semibold mt-4 mb-2 text-left italic font-dm-sans">Description</h3>
          <p class="text-gray-700 leading-6 font-dm-sans text-justify w-full max-w-full">
            {!! nl2br(e($product->description)) !!}
          </p>
        </div>

        <!-- Pairs Well With Section -->
        <div class="mt-10 items-center justify-center mx-auto">
          <h3 class="text-lg font-semibold mb-4 text-left font-dm-sans">Pairs Well With</h3>
          <div class="flex flex-col sm:flex-row gap-6 pb-4 overflow-x-auto sm:overflow-x-visible">
            @foreach ($recommended as $item)
              <x-product-card 
                :name="$item->name" 
                :image="$item->image_URL" 
                :price="'P' . $item->price" 
                :route="route('product.show', ['product' => $item->product_ID])" 
                :brand="optional($item->productDetail->store)->image_url ?? 'images/brands/default.png'"
              />
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </main>

  @include('pages.footer')
</body>
</html>
