<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite(['resources/css/app.css', 'resources/js/app.js']) 
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&family=Barlow:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
</head>

<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
    <header>
        <button id="open-menu" class="flex flex-col gap-1.5 bg-none border-0 cursor-pointer absolute top-5 left-5 z-50" aria-label="Toggle menu">
            <img src="{{ asset('images/sabrosa_stable_logo.png') }}" alt="Header Image" class="w-auto h-12 sm:h-12 md:h-12 mb-4">
        </button>

        <div id="overlay" class="fixed inset-0 z-30 hidden"></div>
      <div id="mobile-slide-menu" class="fixed top-0 left-0 h-full bg-pink-100 text-white transform -translate-x-full transition-transform duration-300 z-40 flex flex-col w-full md:w-1/4 z-50">

      <div class="flex justify-between items-center p-6">
        <a href="{{ route('home') }}">
        <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-40 h-auto">
        </a>
        
        <button id="close-menu" class="text-[#1F27A6] text-3xl font-bold">&times;</button>
      </div>

      <nav class="flex flex-col gap-6 px-12 text-xl mt-6 text-left">
        <a href="{{ route('shop') }}" class="hover:underline text-[#1F27A6]">Dashboard</a>
        <a href="{{ route('about') }}" class="hover:underline text-[#1F27A6]">Products</a>
        <a href="{{ route('contact') }}" class="hover:underline text-[#1F27A6]">Employees</a>
        <a href="{{ route('contact') }}" class="hover:underline text-[#1F27A6]">Users</a>
        <a href="{{ route('contact') }}" class="hover:underline text-[#1F27A6]">Orders</a>
      </nav>

      <div class="flex-grow"></div>

      <div class="px-6 pb-8 flex flex-col items-start gap-4">

        <div class="flex gap-4 mt-2 px-6">
          <a href="#" target="_blank"><img src="{{ asset('images/facebok.png') }}" alt="TikTok" class="h-6 w-6"></a>
          <a href="#" target="_blank"><img src="{{ asset('images/twitter.png') }}" alt="Facebook" class="h-6 w-6"></a>
          <a href="#" target="_blank"><img src="{{ asset('images/insta.png') }}" alt="Twitter" class="h-6 w-6"></a>
          <a href="#" target="_blank"><img src="{{ asset('images/yt.png') }}" alt="Twitter" class="h-6 w-6"></a>
        </div>
      </div>
    </header>
</body>

</html>