<aside id="mobile-slide-menu" class="fixed md:fixed top-0 left-0 h-full bg-pink-100 text-white transform md:transform-none -translate-x-full md:translate-x-0 transition-transform duration-300 z-40 flex flex-col w-full md:w-1/5 md:z-auto">

      <div class="flex justify-between items-center p-6">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-40 h-auto">
        </a>
        <button id="close-menu" class="md:hidden text-[#1F27A6] text-3xl font-bold">&times;</button>
      </div>

      <nav class="flex flex-col gap-6 px-8 text-xl mt-6 text-left">
        
        <a 
          href="{{ route('contact') }}" 
          class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
                {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
          Dashboard
        </a>

        <a 
          href="{{ route('about') }}" 
          class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
                {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
          Products
        </a>

        <a 
          href="{{ route('contact') }}" 
          class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
                {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
          Employees
        </a>

        <a 
          href="{{ route('contact') }}" 
          class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
                {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
          Users
        </a>

        <a 
          href="{{ route('contact') }}" 
          class="hover:bg-pink-200 hover:text-white px-4 py-2 rounded 
                {{ request()->routeIs('about') ? 'bg-pink-300 text-white font-semibold' : 'text-[#1F27A6]' }}">
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