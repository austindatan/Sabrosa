<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Your Cart </title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white/75 rounded-lg shadow-lg">
  <h2 class="text-2xl sm:text-3xl font-bold mb-6 sm:mb-10 border-b pb-4 sm:pb-5 font-poppins">Your cart</h2>

  <div class="hidden sm:grid grid-cols-12 font-thin text-gray-700 mb-5 text-xs font-poppins">
    <div class="col-span-6">PRODUCT</div>
    <div class="col-span-3 text-center">QUANTITY</div>
    <div class="col-span-3 text-right">TOTAL</div>
  </div>

  <x-cart-item
  image="{{ asset('images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png') }}"
  name="Way of the Strong Special Mixed Yakisoba"
  priceText="P145"
  quantity="1"
  total="P145"
  />

  <x-cart-item
  image="{{ asset('images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png') }}"
  name="Tea Chest Jubilee Petite Pyramid"
  priceText="P635"
  quantity="2"
  total="P1270"
  />

  <x-cart-item
  image="{{ asset('images/product/product_sprites/Tropical Mango and Passionfruit Cookie.png') }}"
  name="Tropical Mango & Passionfruit Cookie"
  priceText="P85"
  quantity="1"
  total="P85"
  />

  <div class="mt-8">
    <a href="{{ route('shop') }}" class="text-gray-700 underline text-base hover:text-black font-dm-sans">← Continue shopping</a>
  </div>

  <div class="mt-6 text-right text-xl sm:text-2xl font-bold font-poppins">
    Estimated Total: P1500
  </div>

  <p class="text-right text-sm text-gray-500 mt-1 font-dm-sans">
  Taxes included. Discounts and shipping calculated at checkout.
  </p>

  <div class="flex justify-end mt-4">
    <a href="..." class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold text-sm px-6 py-2 rounded transition duration-200">
      Continue to Checkout
    </a>
  </div>


</main>

  @include('pages.footer')

</body>
</html>
