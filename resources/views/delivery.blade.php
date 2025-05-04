<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Delivery</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

<<<<<<< HEAD
  <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white/80 rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      {{-- LEFT SIDE: Delivery --}}
      <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-right font-poppins">Delivery</h2>
          <p class="text-sm text-gray-600 font-dm-sans">you@example.com</p>
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

        <a href="/checkout" class="block text-center w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded transition duration-200">
          Continue to Payment
        </a>

      </div>

      <div class="block lg:hidden bg-gray-100 rounded-md overflow-hidden text-sm text-center ">

        <details class="p-6 space-y-4">
          <summary class="text-xl font-bold font-poppins cursor-pointer mt-4">Order Summary</summary>

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
              <p class="text-sm font-semibold">P635</p>
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

      <!-- Desktop (always visible) -->
      <div class="hidden lg:block lg:col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2">
        <h2 class="text-xl font-bold font-poppins">Order Summary</h2>

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
            <p class="text-sm font-semibold">P635</p>
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
=======
    <div class="header-image w-full mt-[80px]">
        <img src="{{ asset('images/hero_banner.png') }}" alt="Header Image" class="w-full h-auto">
    </div>

    <section class="max-w-[1200px] mx-auto pt-12 px-4 sm:px-6 md:px-[60px] lg:px-[100px]">
      <div class="flex justify-between items-center w-full mb-7">
        <h4 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#1F27A6] font-[Poppins]">
          Tasty Treats
        </h4>
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[80px] sm:w-[100px] md:w-[120px] object-contain">
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach (['Donuts' => 'treats_donut.png', 'Cookies' => 'treats_cookies.png', 'Drinks' => 'treats_drinks.png', 'Meals' => 'treats_meals.png'] as $title => $image)
        <div class="bg-[#FDC0D0] border-2 border-[#E55182] rounded-[20px] flex flex-col justify-between transition duration-300 ease-in-out hover:shadow-md">
          <div class="aspect-[3/2] overflow-hidden rounded-t-[20px]">
            <img src="{{ asset('images/' . $image) }}" alt="{{ $title }}" class="w-full h-full object-cover">
          </div>
          <div class="bg-white p-4 flex items-center justify-between rounded-b-[20px]">
            <p class="font-[Barlow] text-sm sm:text-base text-black font-medium ml-[5px]">{{ $title }}</p>
            <div class="w-[20px] h-[20px] rounded-full flex items-center justify-center mr-[3px]">
              <img src="{{ asset('images/arrow.png') }}" class="w-[17px] h-[17px]">
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </section>

    <section class="max-w-[1200px] mx-auto pt-[50px] px-6 sm:px-10 md:px-[60px] lg:px-[100px] flex items-center justify-center">
      <div class="flex flex-col items-center text-center">
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[130px] h-[50px] object-contain">
        
        <h5 class="text-2xl font-bold text-[#E55182] font-[Poppins] mt-1">
          Featured Items
        </h5>
        
        <p class="text-black font-[DM Sans] mt-3 px-4 sm:px-10 md:px-[100px] leading-[1.2] tracking-[0.2px]">
          Explore our signature items, crafted to perfection and bursting with flavors that will leave you craving more. Discover your new favorites today!
        </p>
      </div>
    </section>

    <div class="displayed-products flex flex-wrap justify-center items-center mt-10 gap-6 px-4">
      <x-home-card 
        name="Tropical Mango & Passionfruit Cookie" 
        image="images/product/product_sprites/Tropical Mango  & Passionfruit Cookie.png" 
        price="P85" 
        :route="route('product.show', ['product' => 1])" 
        brand="images/brands/byronbay.png"
      />

      <x-home-card
        name="Complimentary Pairs SABROSA Originals"
        image="images/product/product_sprites/Complimentary Pairs SPICE Originals.png"
        price="P515"
        :route="route('product.show', ['product' => 20])"
        brand="images/brands/sabrosa.png"
      />

      <x-home-card
        name="BARBIE Peaches & Cream Soda"
        image="images/product/product_sprites/BARBIE Peaches & Cream Soda.png"
        price="P85"
        :route="route('product.show', ['product' => 42])"
        brand="images/brands/olipop.png"
      />
    </div>

    <div class="displayed-products flex flex-wrap justify-center items-center mt-10 gap-6 px-4">
      <x-home-card
        name="Way of the Strong  Special Mixed Yakisoba"
        image="images/product/product_sprites/Way of the Strong  Special Mixed Yakisoba.png"
        price="P145"
        :route="route('product.show', ['product' => 70])"
        brand="images/brands/sweetsparadise.png"
      />

      <x-home-card
        name="Tea Chest Jubilee Petite Pyramid"
        image="images/product/product_sprites/Tea Chest Jubilee Petite Pyramid.png"
        price="P635"
        :route="route('product.show', ['product' => 49])"
        brand="images/brands/teaforte.png"
      />

      <x-home-card
        name="Chobani Flip S`more S`mores"
        image="images/product/product_sprites/Chobani Flip S`more S`mores.png"
        price="P125"
        :route="route('product.show', ['product' => 26])"
        brand="images/brands/chobani.png"
      />
    </div>

    <div class="about-image flex flex-col lg:flex-row justify-center items-center mt-20 mb-16 gap-12 px-6 md:px-10">

      <img src="{{ asset('images/sabrosa-card.png') }}" alt="Header Image"
        class="w-64 md:w-80 lg:w-[300px] h-auto align-middle" />

      <div class="max-w-xl text-center lg:text-left">
        <h4 class="text-2xl md:text-3xl lg:text-2x1 font-bold text-[#1F27A6] mb-6 font-[Poppins] w-[350px] md:w-[450px] lg:w-[550px] mx-auto lg:mx-0">
          Our Story, Your Flavor Journey
        </h4>
        <p class="text-black text-base md:text-lg font-[Poppins] leading-relaxed text-justify w-[350px] md:w-[500px] lg:w-[600px] mx-auto lg:mx-0">
          At <span class="text-[#1F27A6] font-semibold">Sabrosa</span>, we believe that snacks should be more than just a quick bite; they should be a moment of joy.
          <br><br>
          Our journey began with a simple yet exciting idea: to craft snacks that elevate your snacking experience with bold flavors, creativity, and quality. Whether you're looking for something savory, sweet, or a little bit of both, we’ve got something to satisfy every craving.
        </p>
      </div>

>>>>>>> cb6d58ffe2dbb21a7a2f0b3b9ef0aa748f4cb3ce
    </div>
  </main>

  @include('pages.footer')
</body>
</html>
