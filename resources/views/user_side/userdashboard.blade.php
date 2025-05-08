<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Profiles</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 px-4 sm:px-6 py-6 max-w-full sm:max-w-3xl lg:max-w-6xl mx-auto mt-20 sm:mt-[200px] mb-12 sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      {{-- LEFT SIDE: Delivery --}}
      <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-right font-poppins">Profile</h2>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="flex items-center justify-between mb-4 gap-60">
            <h2 class="text-lg font-semibold text-left">Account Information</h2>
            <button class="text-sm text-blue-600 hover:underline"><svg class="h-6 w-6 text-gray-950"  fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
          </div>
            
          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Name</span>
              <div class="flex items-center gap-2">
              <span class="text-gray-900 font-medium">Austin Datan</span>
            </div>
          </div>
          
          <div class="flex items-center justify-between">
            <span class="text-gray-600">Email</span>
            <span class="text-gray-900 font-medium">austindatan@gmail.com</span>
          </div>

          <div class="flex items-center justify-between">
            <span class="text-gray-600">Phone Number</span>
            <span class="text-gray-900 font-medium">09262103722</span>
          </div>
          </div>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">

          <div class="flex items-center justify-between mb-4">
            <h3 class="text-md font-semibold">Addresses</h3>
            <button class="text-sm text-blue-600 hover:underline font-medium">+ Add</button>
          </div>

          <div class="border border-dashed border-gray-300 p-4 rounded-md text-gray-500 flex items-center gap-2">
            <span>ℹ️</span>
            <span>No addresses added</span>
          </div>
        </div>

        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="flex items-center justify-between mb-4">
            <h2 class="text-lg font-semibold text-left">Account Settings</h2>
         </div>
            
          <div class="space-y-4 mb-3">
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Change Password</span>
            </div>
          </div>
          
          <div class="flex items-center justify-between">
            <span class="text-red-600">Delete Accouunt</span>
          </div>
        </div>
      </div>

      {{-- SMALL SCREENS NI SHAAAA--}}
      <div class="mobile block lg:hidden bg-gray-100 rounded-md overflow-hidden text-sm text-center ">

        <details class="p-6 space-y-4">
          <summary class="text-xl cursor-pointer mt-4 text-left font-poppins text-semibold">Order History</summary>

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
        </details>
      </div>

      <div class="hidden lg:block lg:col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2">
        <h2 class="text-xl font-poppins text-semibold text-left">Order History</h2>

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
      </div>

      </div>
      <form method="POST" action="{{ route('logout') }}" class="mt-6 text-center">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">
                    Logout
                </button>
            </form>
    </div>
  </main>

  @include('pages.footer')
</body>
</html>
