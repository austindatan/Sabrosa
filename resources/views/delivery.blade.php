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
          <h2 class="text-2xl font-bold text-right font-poppins">Delivery</h2>
          <p class="text-sm text-gray-600 font-dm-sans">you@example.com</p>
        </div>

        <p class="text-base text-gray-600 font-dm-sans mx-auto">Express Checkout</p>

        <div class="grid grid-cols-3 gap-4 w-full font-dm-sans">
          <div class="flex justify-center items-center w-full">
            <img src="{{ asset('images/maya-3.png') }}" class="bg-[#00b464] w-full h-18 object-contain rounded" />
          </div>
          <div class="flex justify-center items-center w-full">
            <img src="{{ asset('images/gcash-2.png') }}" class="bg-blue-300 w-full h-18 object-contain rounded" />
          </div>
          <div class="flex justify-center items-center w-full">
            <img src="{{ asset('images/paypal.png') }}" class="bg-yellow-400 w-full h-18 object-contain rounded" />
          </div>
        </div>

        <div class="flex items-center justify-center gap-4 my-6">
          <div class="flex-grow border-t border-gray-300"></div>
          <p class="text-base text-gray-600 font-dm-sans">OR</p>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

        <div class="grid grid-cols-2 gap-4 font-dm-sans">
          <div class="relative w-full">
            <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
              First Name
            </label>
          </div>

          <div class="relative w-full">
            <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
              Last Name
            </label>
          </div>
        </div>

        <div class="relative w-full">
            <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
              Email
            </label>
        </div>

        <div class="relative w-full">
          <select id="region" class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400 appearance-none">
            <option>Philippines</option>
            <option>Singapore</option>
            <option>Malaysia</option>
          </select>
          
          <label for="region" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500 peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400">
            Province
          </label>
        </div>

        <div class="relative w-full">
          <select id="region" class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400 appearance-none">
            <option>Cagayan de Oro City</option>
            <option>Singapore</option>
            <option>Malaysia</option>
          </select>
          
          <label for="region" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500 peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400">
            City / Municipality
          </label>
        </div>

        <div class="relative w-full">
          <select id="region" class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400 appearance-none">
            <option>Carmen</option>
            <option>Singapore</option>
            <option>Malaysia</option>
          </select>
          
          <label for="region" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500 peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400">
            Barangay
          </label>
        </div>

        <div class="relative w-full">
            <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
              Address
            </label>
        </div>

        <div class="relative w-full">
            <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
              Company (optional)
            </label>
        </div>

        <div class="relative w-full">
            <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
            <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
              Phone Number (optional)
            </label>
        </div>

        <div class="mb-4">
          <h2 class="text-lg font-bold text-left font-poppins">Payment</h2>
          <p class="text-sm text-gray-600 font-dm-sans text-left">All transactions are secure and encrypted.</p>
        </div>

        <div class="lg:col-span-2 space-y-6 bg-gray-100 p-4 rounded-lg">

          <label class="flex items-center gap-2 cursor-pointer mb-2">
            <input type="radio" name="paymentMethod" value="creditCard" class="accent-blue-600" />
            <span class="text-base font-semibold text-left font-poppins">Credit Card</span>
          </label>

          <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class=" peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Card Number
              </label>
          </div>

          <div class="grid grid-cols-2 gap-4 font-dm-sans">
            <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Expiration Date (MM/YY)
              </label>
            </div>

            <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Security Code
              </label>
            </div>
          </div>

          <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Name on Card
              </label>
          </div>

          <label class="flex items-center gap-2 cursor-pointer mb-2">
            <input type="radio" name="paymentMethod" value="creditCard" class="accent-blue-600" />
            <span class="text-base font-semibold text-left font-poppins">Cash on Delivery</span>
          </label>

          <div class="grid grid-cols-2 gap-4 font-dm-sans">
            <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                First Name
              </label>
            </div>

            <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Last Name
              </label>
            </div>
          </div>

          <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class=" peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Address
              </label>
          </div>    

          <div class="bg-white relative w-full">
              <input type="text" id="first_name" placeholder=" " class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" />
              <label for="first_name" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-placeholder-shown:top-3.5 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                Phone Number
              </label>
          </div>
        </div>

        <a href="/checkout" class="block text-center w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded transition duration-200">
          Continue to Payment
        </a>

      </div>

      {{-- SMALL SCREENS NI SHAAAA--}}
      <div class="mobile block lg:hidden bg-gray-100 rounded-md overflow-hidden text-sm text-center ">

        <details class="p-6 space-y-4">
          <summary class="text-xl text-left font-bold font-poppins cursor-pointer mt-4">Order Summary</summary>

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
              <span class="font-dm-sans text-gray-500">Enter address</span>
            </div>
          </div>

          <div class="flex justify-between text-lg font-bold border-t pt-4">
            <span class="font-poppins">Total</span>
            <span class="font-poppins">P1500</span>
          </div>

          <p class="text-sm text-gray-500 text-right font-dm-sans">
            Taxes included. Discounts and shipping calculated at checkout.
          </p>
        </details>
      </div>

      <div class="hidden lg:block lg:col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2">
        <h2 class="text-xl font-bold font-poppins text-left">Order Summary</h2>

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
            <span class="font-dm-sans text-gray-500">Enter address</span>
          </div>
        </div>

        <div class="flex justify-between text-lg font-bold border-t pt-4">
          <span class="font-poppins">Total</span>
          <span class="font-poppins">P1500</span>
        </div>

        <p class="text-sm text-gray-500 text-right font-dm-sans">
          Taxes included. Discounts and shipping calculated at checkout.
        </p>
      </div>

      </div>
    </div>
  </main>

  @include('pages.footer')
</body>
</html>
