<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    @vite(['resources/css/app.css','resources/css/handle_orders.css','resources/js/handle_orders_script.js']) 
    <title>Web Analytics Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body class="bg-pink-50">
    <div class="app min-h-screen flex flex-col md:flex-row">

      <!-- Sidebar -->
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

  
      <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
        <div class="flex justify-between items-center mb-4">
              
      <div class="flex-1 p-6">
    
        <header class="flex justify-between items-center mb-6">
          <h1 class="text-3xl font-bold text-gray-800">Orders</h1>
          <div class="flex items-center space-x-4">
          <div class="relative">
</div>
          </div>
        </header>
        
        <div class="grid grid-cols-5 gap-4 mb-6">
          <div class="bg-blue-600 text-white p-4 rounded">
            <h2 class="text-base font-bold">Validating</h2>
            <p class="text-1xl">3022</p>
          </div>
          <div class="bg-red-400 text-white p-4 rounded">
            <h2 class="text-base font-bold">In Delivery</h2>
            <p class="text-1xl">572</p>
          </div>
          <div class="bg-pink-600 text-white p-4 rounded">
            <h2 class="text-base font-bold">Action Pending</h2>
            <p class="text-1xl">51</p>
          </div>
          <div class="bg-green-500 text-white p-4 rounded">
            <h2 class="text-base font-bold">Completed</h2>
            <p class="text-1xl">844</p>
          </div>
          <div class="bg-gray-400 text-white p-4 rounded">
            <h2 class="text-base font-bold">Cancelled</h2>
            <p class="text-1xl">346</p>
          </div>
        </div>

   
        <div class="bg-white rounded shadow p-4">
          <div class="flex justify-between mb-4 gap-110">
          <input
  type="text"
  placeholder="Search for orders..."
  class="pl-5 pr-4 px-5 py-0 border border-pink-500 rounded w-full focus:outline-none focus:ring-2 focus:ring-pink-300"
/>

            <select class="border px-3 py-1 rounded border-pink-500 focus:ring-2 focus:ring-pink-300 text-gray-700">
              <option>Filter by Orders</option>
            </select>
          </div>

          <table class="w-full table-fixed text-sm text-left text-pink-900">
  <thead class="text-xs uppercase bg-pink-100 text-pink-700">
    <tr>
    <th class="w-35 px-4 py-3 truncate">Reference Number</th>
    <th class="w-32 px-4 py-3 truncate">Order Number</th>
      <th class="w-32 px-4 py-3 truncate">Price</th>
      <th class="w-32 px-4 py-3 truncate">Date Added</th>
      <th class="w-32 px-4 py-3 truncate">Delivery Date</th>
      <th class="w-32 px-4 py-3 truncate">Status</th>
    </tr>
  </thead>
  <tbody>
    <tr class="bg-white border-b border-pink-200 hover:bg-pink-50">
      <td class="px-4 py-4 truncate">
        <a href="#" class="font-medium text-pink-600 hover:underline">W969851-17OCT21</a>
      </td>
      <td class="px-4 py-4 truncate">123242</td>
      <td class="px-4 py-4 truncate">₱459</td>
      <td class="px-4 py-4 truncate">06/05/2025</td>
      <td class="px-4 py-4 truncate">0/6/12/2025</a>
      </td>
      <td class="px-4 py-4">
  <span class="bg-blue-500 text-white px-2 py-1 rounded text-xs">VALIDATING</span>
</td>

    </tr>
  </tbody>
</table>
        </div>
      </div>
    </div>
  </body>
</html>
