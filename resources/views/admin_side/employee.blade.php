<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    @vite(['resources/css/app.css', 'resources/js/dashboard_script.js']) 
    <title>Web Analytics Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body class="bg-pink-50">

  <div class="app min-h-screen flex flex-col md:flex-row"> <!-- 👈 flex-row on md+ -->

    <aside id="mobile-slide-menu" class="fixed md:static top-0 left-0 md:h-screen h-full bg-pink-100 text-white transform md:translate-x-0 -translate-x-full md:transition-none transition-transform duration-300 z-40 flex flex-col w-full md:w-1/5 md:z-auto">

      <div class="flex justify-between items-center p-6">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/sabrosa_logo.png') }}" alt="Sabrosa Logo" class="w-40 h-auto">
        </a>
        <button id="close-menu" class="md:hidden text-[#1F27A6] text-3xl font-bold">&times;</button>
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
          <a href="#" target="_blank"><img src="{{ asset('images/facebok.png') }}" alt="Facebook" class="h-6 w-6"></a>
          <a href="#" target="_blank"><img src="{{ asset('images/twitter.png') }}" alt="Twitter" class="h-6 w-6"></a>
          <a href="#" target="_blank"><img src="{{ asset('images/insta.png') }}" alt="Instagram" class="h-6 w-6"></a>
          <a href="#" target="_blank"><img src="{{ asset('images/yt.png') }}" alt="YouTube" class="h-6 w-6"></a>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
      <div class="flex justify-between items-center mb-4 gap-24">
        <h2 class="text-2xl font-bold text-right font-poppins">Delivery</h2>
        <p class="text-sm text-gray-600 font-dm-sans">you@example.com</p>
      </div>
    </main>

  </div>
</body>

</html>
