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

      <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-6 mb-6 mr-4 bg-white border-2 border-[#E55182] rounded-lg shadow-lg text-base sm:text-lg md:ml-[calc(21%+1rem)]">
        <div class="flex flex-col p-6">
          <h1 class="text-2xl font-bold text-[#E55182] mb-6">Orders List</h1>

          <!-- Summary Cards -->
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
            <div class="bg-blue-600 text-white p-6 rounded">
              <h2 class="text-lg font-bold">Pending Order</h2>
              <p class="text-2xl mt-2">{{ $pendingOrder }}</p>
            </div>
            <div class="bg-pink-300 text-white p-6 rounded">
              <h2 class="text-lg font-bold">Completed</h2>
              <p class="text-2xl mt-2">{{ $completed }}</p>
            </div>
          </div>

          <!-- Orders Table -->
          <div class="bg-white rounded shadow p-4">

            <!-- Search and Filters -->
            <form method="GET" action="{{ url()->current() }}" class="flex items-center justify-between mb-4 flex-wrap gap-2">
              
              <!-- Search -->
              <div class="relative">
                <input
                  type="text"
                  name="search"
                  value="{{ request('search') }}"
                  class="block w-80 ps-10 py-2 text-sm text-pink-900 border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500 placeholder-pink-400"
                  placeholder="Search..."
                  oninput="this.form.submit()"
                >
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                  <svg class="w-4 h-4 text-pink-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                  </svg>
                </div>
              </div>

              <!-- Status Filter -->
              <div>
                <select
                  name="status"
                  onchange="this.form.submit()"
                  class="py-2 px-3 text-sm text-[#E55182] border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500"
                >
                  <option value="">All Status</option>
                  <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                  <option value="Completed" {{ request('status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
              </div>

              <!-- Sort Options -->
              <div>
                <select
                  name="sort"
                  onchange="this.form.submit()"
                  class="py-2 px-3 text-sm text-[#E55182] border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500"
                >
                  <option value="">Sort By</option>
                  <option value="date_desc"  {{ request('sort') == 'date_desc' ? 'selected' : '' }}>Date Newest → Oldest</option>
                  <option value="date_asc"   {{ request('sort') == 'date_asc' ? 'selected' : '' }}>Date Oldest → Newest</option>
                  <option value="name_asc"   {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name A–Z</option>
                  <option value="name_desc"  {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name Z–A</option>
                  <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price High → Low</option>
                  <option value="price_asc"  {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price Low → High</option>
                </select>
              </div>

            </form>

            <!-- Scrollable Table -->
            <div class="overflow-x-auto max-h-80 overflow-y-auto">
              <table class="w-full table-fixed text-sm text-left text-pink-900">
                <thead class="text-xs uppercase bg-pink-100 text-pink-700">
                  <tr>
                    <th class="w-1/6 px-4 py-3 truncate">Transaction No.</th>
                    <th class="w-1/3 px-4 py-3 truncate">Customer Name</th>
                    <th class="w-1/6 px-4 py-3 truncate">Price</th>
                    <th class="w-1/6 px-4 py-3 truncate">Date Added</th>
                    <th class="w-1/6 px-4 py-3 truncate">Status</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($orders as $order)
                    <tr class="bg-white border-b border-pink-200 hover:bg-pink-50">
                      <td class="px-4 py-4 truncate">
                        <a href="#" class="font-medium text-pink-600 hover:underline">
                          {{ $order->transaction_token }}
                        </a>
                      </td>
                      <td class="px-4 py-4 truncate">{{ $order->customer_name }}</td>
                      <td class="px-4 py-4 truncate">₱{{ number_format($order->total_price, 2) }}</td>
                      <td class="px-4 py-4 truncate">
                        {{ \Carbon\Carbon::parse($order->date_added)->format('m/d/Y') }}
                      </td>
                      <td class="px-4 py-4">
                        @php
                          $statusColors = [
                            'Pending'   => 'bg-blue-500',
                            'Completed' => 'bg-pink-300',
                          ];
                        @endphp
                        <span class="{{ $statusColors[$order->status] ?? 'bg-pink-500' }} text-white px-2 py-1 rounded text-xs">
                          {{ strtoupper($order->status) }}
                        </span>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="5" class="text-center py-4 text-pink-600">
                        No orders found.
                      </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>

          </div>
        </div>
      </main>
    </div>
  </body>
</html>
