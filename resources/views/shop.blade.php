<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Shop</title>
  @include('pages.head')
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden">

  @include('pages.header')
  <main class="flex-grow">
  <div class="w-full mt-[80px]">
    <img src="{{ asset('images/shop_banner.png') }}" alt="Header Image" class="w-full h-auto">
  </div>

  <div class="relative overflow-hidden max-w-[2220px] mx-auto pt-[50px] px-[100px] pb-0 mb-[100px]">

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Cookies</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cookiesleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cookiesrightArrow()">&#10095;</button>
    </div>  </div>

    <div id="cookiesslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
      @foreach ($cookieProducts as $product)
        <x-product-card 
            name="{!! $product->name !!}"
            image="{!! asset($product->image_URL) !!}"
            price="₱{{ $product->price }}"
            :route="route('product.show', ['product' => $product->product_ID])" 
            brand="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}"
        />
      @endforeach 
    </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Donuts</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="donutsleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="donutsrightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="donutsslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
      @foreach ($donutProducts as $product)
        <x-product-card 
            name="{!! $product->name !!}"
            image="{!! asset($product->image_URL) !!}"
            price="₱{{ $product->price }}"
            :route="route('product.show', ['product' => $product->product_ID])" 
            brand="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}"
        />
      @endforeach 
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Cakes & Chocolates</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cakesleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="cakesrightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="cakesslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
    @foreach ($cakeProducts as $product)
      <x-product-card 
          name="{!! $product->name !!}"
          image="{!! asset($product->image_URL) !!}"
          price="₱{{ $product->price }}"
          :route="route('product.show', ['product' => $product->product_ID])" 
          brand="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}"
      />
    @endforeach 
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Drinks & Tea</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="drinksAndTealeftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="drinksAndTearightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="drinksAndTeaslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
    @foreach ($drinksProducts as $product)
      <x-product-card 
          name="{!! $product->name !!}"
          image="{!! asset($product->image_URL) !!}"
          price="₱{{ $product->price }}"
          :route="route('product.show', ['product' => $product->product_ID])" 
          brand="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}"
      />
    @endforeach 
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">Meals</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="mealsleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="mealsrightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="mealsslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
    @foreach ($mealProducts as $product)
      <x-product-card 
          name="{!! $product->name !!}"
          image="{!! asset($product->image_URL) !!}"
          price="₱{{ $product->price }}"
          :route="route('product.show', ['product' => $product->product_ID])" 
          brand="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}"
      />
    @endforeach 
  </div>

  <div class="flex items-center justify-between mb-5">
    <h4 class="text-4xl font-bold text-[#FF6C9B] mb-2 text-left font-[Poppins]">We also have!</h4>
    <div class="flex gap-4">
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="MICleftArrow()">&#10094;</button>
      <button class="bg-pink-400 text-white rounded-full w-10 h-10 text-2xl cursor-pointer" onclick="MICrightArrow()">&#10095;</button>
    </div>
  </div>

  <div id="MICslider" class="flex gap-4 overflow-x-auto scroll-smooth scrollbar-hide mb-[32px]">
    @foreach ($micProducts as $product)
      <x-product-card 
          name="{!! $product->name !!}"
          image="{!! asset($product->image_URL) !!}"
          price="₱{{ $product->price }}"
          :route="route('product.show', ['product' => $product->product_ID])" 
          brand="{{ asset(optional($product->productDetail->store)->image_url ?? 'images/brands/default.png') }}"
      />
    @endforeach 
  </div>

</div>

  </div>
</main>
  @include('pages.footer')
  
</body>
</html>
