<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel ="stylesheet" href="{{ asset('css/app.css') }}" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Barlow:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}" />
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  <header>
    <nav class="flex justify-between items-center p-10 bg-pink-100 text-[#1F27A6] shadow-md fixed top-0 left-0 w-full z-10 font-poppins font-medium">

      <!-- Mobile Menu Button -->
      <button id="open-menu" class="flex flex-col gap-1.5 bg-none border-0 cursor-pointer absolute left-8 sm:left-[50px] top-1/2 -translate-y-1/2 z-50" aria-label="Toggle menu">
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
      </button>

      <!-- Center Logo -->
      <div class="absolute left-1/2 transform -translate-x-1/2 z-20">
        <a href="{{ route('home') }}">
          <img 
            src="{{ asset('images/sabrosa_logo.png') }}" 
            alt="Sabrosa Logo" 
            class="w-[180px] h-[70px] sm:w-[200px] sm:h-[80px] md:w-[270px] md:h-[100px] hover:underline transition-all duration-300"
          />
        </a>
      </div>

      <!-- Desktop Icons -->
      <div class="hidden md:flex items-center gap-6 pr-20 ml-auto relative">
        <!-- Search Icon -->
        <button id="toggle-search" class="focus:outline-none relative z-50">
          <img id="search-logo" src="{{ asset('images/search_logo.png') }}" alt="Search" class="w-7 h-auto">
        </button>

        <!-- Slide-in Search Bar -->
        <form id="search-box" action="{{ route('home') }}" method="GET" class="search-box-slide bg-white border border-[#1F27A6] rounded-md px-3 py-1 shadow-md z-40">
          <input 
            type="text" 
            name="query" 
            placeholder="Search..." 
            class="text-sm text-[#1F27A6] focus:outline-none bg-transparent w-48"
          />
        </form>

        <!-- Profile Icon -->
        <a href="{{ Auth::check() ? route(auth()->user()->role . '.dashboard') : route('register') }}">
          <img src="{{ asset('images/profile_logo.png') }}" alt="Account" class="w-7 h-auto">
        </a>

        <!-- Cart Icon -->
        <a href="{{ auth()->check() ? route('cart') : route('cart.not_logged_in') }}">
          <img src="{{ asset('images/cart_logo.png') }}" alt="Cart" class="w-7 h-auto">
        </a>
      </div>
    </nav>
  </header>
</body>
</html>
