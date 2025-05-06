<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    @vite(['resources/css/app.css','resources/css/handle_orders.css','resources/js/handle_orders_script.js']) 
    <title>Sabrosa Dashboard | Order List</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
  </head>

  <body class="bg-pink-50">
    <div class="app min-h-screen flex flex-col md:flex-row">
    @include('admin_side.sidebar')
      <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
        <div class="flex justify-between items-center mb-4"> 
        <div class="flex-1 p-6">
          
          <h1 class="text-2xl font-bold text-[#E55182] mb-4">Orders List</h1>     
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
        <div class="relative overflow-x-auto sm:rounded-lg"><div class="pb-4 bg-white">
          <div class="flex items-center justify-between gap-x-4">
            
            <div class="relative">
              <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-pink-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
              </div>
              <input
                type="text"
                id="table-search"
                class="block w-80 ps-10 py-2 text-sm text-pink-900 border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500 placeholder-pink-400"
                placeholder="Search for orders"
              >
            </div>

            <div>
              <select class="py-2 px-3 text-sm text-[#E55182] border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
                <option value="">Date</option>
              </select>
            </div>

          </div>
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
                <td class="px-4 py-4 truncate">06/12/2025</a>
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
