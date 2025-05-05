<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Delivery</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white/80 rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      {{-- LEFT SIDE: Delivery --}}
      <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-right font-poppins">Review and Pay</h2>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start">
            <p class="col-span-3 text-lg text-gray-500 text-left">Email</p>
            <p class="col-span-9 text-lg font-medium text-gray-800 text-left">austindatan@gmail.com</p>
          </div>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start">
            <p class="col-span-3 text-lg text-gray-500 text-left">Ship to</p>
            <div class="col-span-9">
              <p class="text-lg font-medium text-gray-800 text-left">#59 A. Villarin St.</p>
              <p class="text-base text-gray-400 text-left">Carmen, Cagayan de Oro City</p>
            </div>
          </div>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start">
            <p class="col-span-3 text-lg text-gray-500 text-left">Delivery</p>
            <div class="col-span-9">
              <p class="text-lg font-medium text-gray-800 text-left">Standard Shipping</p>
              <p class="text-base text-gray-400 text-left">5 to 7 days</p>
            </div>
          </div>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="grid grid-cols-12 gap-x-4 font-dm-sans items-start">
            <p class="col-span-3 text-lg text-gray-500 text-left">Payment<br />Method</p>
            <div class="col-span-9">
              <p class="text-lg font-medium text-gray-800 text-left">Cash on Delivery</p>
              <p class="text-base text-gray-400 text-left">Austin Datan - 0926103722</p>
            </div>
          </div>
        </div>

        <a href="/checkout" class="block text-center w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded transition duration-200">
          Complete Purchase
        </a>

      </div>

      {{-- SMALL SCREENS NI SHAAAA--}}
      <div class="mobile block lg:hidden bg-gray-100 rounded-md overflow-hidden text-sm text-center ">

        <details class="p-6 space-y-4">
          <summary class="text-xl cursor-pointer mt-4 text-left">Your order from <span class="font-bold font-poppins">Sabrosa</span></summary>

          <div class="space-y-4 font-dm-sans">

            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3 relative">
                <div class="relative">
                  <img src="{{ asset('images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                  <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">1</span>
                </div>
                <p class="text-sm text-left w-[150px]">Way of the Strong  Special Mixed Yakisoba</p>
              </div>
              <p class="text-sm font-semibold">P145</p>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3 relative">
                <div class="relative">
                  <img src="{{ asset('images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                  <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">2</span>
                </div>
                <p class="text-sm text-left w-[150px]">Tea Chest Jubilee Petite Pyramid</p>
              </div>
              <p class="text-sm font-semibold">P1270</p>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3 relative">
                <div class="relative">
                  <img src="{{ asset('images/product/product_sprites/Tropical Mango and Passionfruit Cookie.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                  <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">1</span>
                </div>
                <p class="text-sm text-left w-[150px]">Tropical Mango and Passionfruit Cookie</p>
              </div>
              <p class="text-sm font-semibold">P85</p>
            </div>

          </div>

          <div class="border-t pt-4 space-y-2">
            <div class="flex justify-between">
              <span class="font-poppins">Subtotal</span>
              <span class="font-dm-sans">P1500</span>
            </div>
            <div class="flex justify-between">
              <span class="font-poppins">Shipping</span>
              <span class="font-dm-sans text-gray-500">183</span>
            </div>
          </div>

          <div class="flex justify-between text-lg font-bold border-t pt-4">
            <span class="font-poppins">Total</span>
            <span class="font-poppins">P1683</span>
          </div>

          <p class="text-sm text-gray-500 text-right font-dm-sans">
            Taxes included.
          </p>
        </details>
      </div>

      <div class="hidden lg:block lg:col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2">
        <h2 class="text-xl font-dm-sans text-left">Your order from <span class="font-bold font-poppins">Sabrosa</span></h2>

        <div class="space-y-4 font-dm-sans">

          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 relative">
              <div class="relative">
                <img src="{{ asset('images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">1</span>
              </div>
              <p class="text-sm text-left w-[150px]">Way of the Strong  Special Mixed Yakisoba</p>
            </div>
            <p class="text-sm font-semibold">P145</p>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 relative">
              <div class="relative">
                <img src="{{ asset('images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">2</span>
              </div>
              <p class="text-sm text-left w-[150px]">Tea Chest Jubilee Petite Pyramid</p>
            </div>
            <p class="text-sm font-semibold">P1270</p>
          </div>

          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 relative">
              <div class="relative">
                <img src="{{ asset('images/product/product_sprites/Tropical Mango and Passionfruit Cookie.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">1</span>
              </div>
              <p class="text-sm text-left w-[150px]">Tropical Mango and Passionfruit Cookie</p>
            </div>
            <p class="text-sm font-semibold">P85</p>
          </div>

        </div>

        <div class="border-t pt-4 space-y-2">
          <div class="flex justify-between">
            <span class="font-poppins">Subtotal</span>
            <span class="font-dm-sans">P1500</span>
          </div>
          <div class="flex justify-between">
            <span class="font-poppins">Shipping</span>
            <span class="font-dm-sans text-gray-500">P183</span>
          </div>
        </div>

        <div class="flex justify-between text-lg font-bold border-t pt-4">
          <span class="font-poppins">Total</span>
          <span class="font-poppins">P1683</span>
        </div>

        <p class="text-sm text-gray-500 text-right font-dm-sans">
          Taxes included.
        </p>
      </div>

      </div>
    </div>
  </main>

  @include('pages.footer')
</body>
</html>
