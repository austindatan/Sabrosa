<aside id="mobile-slide-menu" class="fixed md:fixed top-0 left-0 h-full bg-pink-100 text-white transform md:transform-none -translate-x-full md:translate-x-0 transition-transform duration-300 z-40 flex flex-col w-full md:w-1/5 md:z-auto">

  <div class="flex justify-between items-center p-6">
    <a href="{{ route('home') }}">
      <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-40 h-auto">
    </a>
    <button id="close-menu" class="md:hidden text-[#1F27A6] text-3xl font-bold">&times;</button>
  </div>

  <nav class="flex flex-col gap-6 px-8 text-xl mt-6 text-left relative">

    <!-- Dashboard -->
    <a 
      href="{{ route('admin.dashboard') }}" 
      class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
            {{ request()->routeIs('admin.dashboard') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
      Dashboard
    </a>

    <div class="group w-full">
      <button 
        class="w-full flex justify-between items-center px-4 py-2 rounded transition
              {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}
              hover:bg-pink-200 hover:text-white">
        Products
        <svg class="w-4 h-4 ml-2 transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block bg-pink-50 text-[#1F27A6] rounded shadow-inner transition-all duration-200 ">
        <a href="{{ route('admin.productlist') }}" class="block px-4 py-2 hover:bg-pink-100 rounded {{ request()->routeIs('admin.productlist') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">Product List</a>
        <a href="{{ route('admin.addproduct') }}" class="block px-4 py-2 hover:bg-pink-100 rounded {{ request()->routeIs('admin.addproduct') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">Add Product</a>
      </div>
    </div>

    <div class="group w-full">
      <button 
        class="w-full flex justify-between items-center px-4 py-2 rounded transition
              {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}
              hover:bg-pink-200 hover:text-white">
              Employees
        <svg class="w-4 h-4 ml-2 transform transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div class="hidden group-hover:block bg-pink-50 text-[#1F27A6] rounded shadow-inner transition-all duration-200 mt-1">
        <a href="{{ route('admin.employees') }}" class="block px-4 py-2 hover:bg-pink-100 rounded {{ request()->routeIs('admin.employees') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">Employee List</a>
        <a href="{{ route('admin.addemployees') }}" class="block px-4 py-2 hover:bg-pink-100 rounded {{ request()->routeIs('admin.addemployees') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">Add Employee</a>
      </div>
    </div>

    <a 
      href="{{ route('admin.handleusers') }}" 
      class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
            {{ request()->routeIs('admin.handleusers') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
      Users
    </a>

    <a 
      href="{{ route('admin.handleorders') }}" 
      class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
            {{ request()->routeIs('admin.handleorders') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
      Orders
    </a>
  </nav>

  <div class="flex-grow"></div>

  <div class="px-6 pb-8 flex flex-col items-start gap-4">
    <div class="flex gap-4 mt-2 px-6">
      <a href="#" target="_blank"><img src="{{ asset('images/facebok.png') }}" alt="Facebook" class="h-6 w-6"></a>
      <a href="#" target="_blank"><img src="{{ asset('images/twitter.png') }}" alt="Twitter" class="h-6 w-6"></a>
      <a href="#" target="_blank"><img src="{{ asset('images/insta.png') }}" alt="Instagram" class="h-6 w-6"></a>
      <a href="#" target="_blank"><img src="{{ asset('images/yt.png') }}" alt="YouTube" class="h-6 w-6"></a>
    </div>
  </div>
</aside>
