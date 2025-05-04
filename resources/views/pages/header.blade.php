<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sabrosa</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  <header>
    <nav class="flex justify-between items-center p-10 bg-pink-100 text-[#1F27A6] shadow-md fixed top-0 left-0 w-full z-10 font-poppins font-medium">
      <button class="flex flex-col gap-1.5 bg-none border-0 cursor-pointer absolute left-5 top-5 md:hidden" aria-label="Toggle menu">
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
        <span class="w-6 h-0.5 bg-[#1F27A6] rounded"></span>
      </button>

      <div class="absolute left-1/2 transform -translate-x-1/2">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-[270px] h-[100px] hover:underline">
        </a>
      </div>

      <ul class="hidden md:flex gap-12 pl-20">
        <li><a href="{{ route('shop') }}" class="hover:underline text-lg">Shop</a></li>
        <li><a href="{{ route('about') }}" class="hover:underline text-lg">About</a></li>
        <li><a href="{{ route('contact') }}" class="hover:underline text-lg">Contact</a></li>
      </ul>

      <div class="hidden md:flex gap-6 pr-20 ml-auto">
        <a href="{{ route('register') }}" target="_blank"><img src="{{ asset('images/search_logo.png') }}" alt="Account" class="h-6 w-auto"></a>
        <a href="{{ route('register') }}" target="_blank"><img src="{{ asset('images/profile_logo.png') }}" alt="Account" class="h-6 w-auto"></a>
        <a href="{{ route('home') }}" target="_blank"><img src="{{ asset('images/cart_logo.png') }}" alt="Account" class="h-6 w-auto"></a>
      </div>
    </nav>
  </header>
</body>
</html>