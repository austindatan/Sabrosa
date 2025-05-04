<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | {{ $product->name }} </title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-1">
    <div class="flex flex-col lg:flex-row gap-10 px-10 py-10 max-w-[1440px] mx-auto mt-[100px]">
      <div class="flex-1 flex flex-col gap-4">
        <img src="{{ asset($product->image_display) }}" alt="{{ $product->name }}" className="h-[450px] object-contain">
      </div>

      <!-- Right: Product Info -->
      <div class="flex-1 flex flex-col gap-2">
        <div class="flex justify-between items-stretch w-full mt-4 gap-4">
          <div class="flex items-center justify-start gap-2 border-2 border-pink-300 rounded-full px-4 py-1 w-fit bg-white">
            <span class="text-pink-500 text-xl">★★★★★</span>
            <span class="text-gray-700 font-semibold">({{ $product->ratings_count ?? 778 }})</span>
          </div>

          <div>
            <img src="{{ asset('images/brands/byronbay.png') }}" class="w-[100px] object-contain invert">
          </div>
        </div>

        <div class="flex justify-between items-stretch w-full mt-4 gap-4">
          <div class="flex-1">
            <h2 class="text-4xl font-bold text-gray-900 leading-tight h-full flex text-left font-dm-sans w-[350px]">
              {{ $product->name }}
            </h2>
          </div>

          <div class="bg-pink-400 text-white text-2xl px-6 py-4 rounded-2xl flex items-center justify-center font-barlow">
            P{{ $product->price }}
          </div>
        </div>

        <div class="flex items-stretch gap-4 mt-6">
          <div class="w-40 flex items-center border-2 border-pink-300 rounded-xl overflow-hidden text-lg font-semibold bg-white">
            <button class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">−</button>
            <span class="w-1/3 text-center py-2">1</span>
            <button class="w-1/3 py-2 text-gray-600 hover:bg-gray-200">+</button>
          </div>

          <button class="flex-1 bg-pink-400 text-white text-lg font-dm-sans px-8 py-3 rounded-xl hover:bg-pink-500 transition">
            Add to Shopping Cart
          </button>
        </div>

        <div class="gap-16">
          <h3 class="text-lg font-semibold mt-4 mb-2 text-left italic font-dm-sans">Description</h3>
          <p class="text-gray-700 leading-5 font-dm-sans text-justify w-[650px]">
          {!! nl2br(e($product->description)) !!}
          </p>
        </div>

        <!-- Pairs Well With Section remains unchanged unless you want that dynamic too -->
        <div class="mt-10">
          <h3 class="text-lg font-semibold mb-4 text-left font-dm-sans">Pairs Well With</h3>
          <div class="flex gap-6 overflow-x-auto">
            <x-product-card 
              name="Granola, Blueberry  & Chia Cookie" 
              image="images/product/product_sprites/Granola, Blueberry  & Chia Cookie.png" 
              price="P85" 
              :route="route('product.show', ['product' => 1])"  
              brand="images/brands/byronbay.png"
            />

            <x-product-card
              name="Le Haut Special Steak Plate"
              image="images/product/product_sprites/Le Haut Special Steak Plate.png"
              price="P435"
              :route="route('product.show', ['product' => 1])" 
              brand="images/brands/granbluekitchen.png"
            />
          </div>
        </div>
      </div>
    </div>
  </main>

  @include('pages.footer')

</body>
</html>
