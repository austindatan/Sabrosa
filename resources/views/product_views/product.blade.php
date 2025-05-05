<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | {{ $product->name }} </title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-1">
    <div class="flex flex-col lg:flex-row gap-10 px-10 py-10 max-w-[1440px] mx-auto mt-[50px]">
      <div class="flex-1 flex flex-col gap-4">
        <img src="{{ asset($product->image_display) }}" alt="{{ $product->name }}" class="h-[1000px] object-contain">
      </div>

      <!-- Right: Product Info -->
      <div class="flex-1 flex flex-col gap-2">
        <div class="flex justify-between items-stretch w-full mt-4 gap-4">
          <div class="flex items-center justify-start gap-2 border-2 border-pink-300 rounded-full px-4 py-1 w-fit bg-white">
            <span class="text-pink-500 text-xl">★★★★★</span>
            <span class="text-gray-700 font-semibold">({{ $product->ratings_count ?? 778 }})</span>
          </div>

          <div>
            <img src="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}" class="w-[100px] object-contain invert">
          </div>
        </div>

        <div class="flex justify-between items-stretch w-full mt-4 gap-4">
          <div class="flex-1">
            <h2 class="text-4xl font-bold text-gray-900 leading-tight h-full flex text-left font-dm-sans w-[350px]">
              {{ $product->name }}
            </h2>
          </div>

          <div class="bg-pink-400 text-white text-2xl px-6 py-4 rounded-2xl flex items-center justify-center font-barlow">
            ₱{{ $product->price }}
          </div>
        </div>

        <!-- ✅ Success Message -->
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

        <!-- Add to Cart Form -->
        <form method="POST" action="{{ route('cart.add') }}" class="flex items-stretch gap-4 mt-6">
          @csrf
          <input type="hidden" name="product_details_ID" value="{{ $product->productDetail->product_details_ID }}">
          <input type="hidden" id="quantity_input" name="quantity" value="1">

          <div class="w-40 flex items-center border-2 border-pink-300 rounded-xl overflow-hidden text-lg font-semibold bg-white">
            <button type="button" id="decrement" class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">−</button>
            <span id="quantity_display" class="w-1/3 text-center py-2">1</span>
            <button type="button" id="increment" class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">+</button>
          </div>

          <button type="submit" class="flex-1 bg-pink-400 text-white text-lg font-dm-sans px-8 py-3 rounded-xl hover:bg-pink-500 transition">
            Add to Shopping Cart
          </button>
        </form>

        <!-- Quantity Logic -->
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
        <div class="gap-16">
          <h3 class="text-lg font-semibold mt-4 mb-2 text-left italic font-dm-sans">Description</h3>
          <p class="text-gray-700 leading-5 font-dm-sans text-justify w-[650px]">
            {!! nl2br(e($product->description)) !!}
          </p>
        </div>

        <!-- Pairs Well With Section -->
        <div class="mt-10">
          <h3 class="text-lg font-semibold mb-4 text-left font-dm-sans">Pairs Well With</h3>
          <div class="flex gap-6 overflow-x-auto">
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