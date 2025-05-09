<!DOCTYPE html>
<html lang="en">
  <head>
    @vite(['resources/js/dashboard_script.js']) 
    <title>Sabrosa Dashboard | Product List</title>
    @include('pages.head')
  </head>
  <body class="bg-pink-50">

  <div class="app min-h-screen flex flex-col md:flex-row">

  @include('admin_side.sidebar')

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      <h1 class="text-2xl font-bold text-[#E55182] mb-4">Product List</h1>
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
                placeholder="Search for items"
              >
            </div>
<div class="flex items-center gap-x-4">
            <div>
              <select id="brandFilter" class="py-2 px-3 text-sm text-[#E55182] border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
                <option value="">All Brands</option>
                <option value="byron bay">Byron Bay</option>
                <option value="graze">Graze</option>
                <option value="laduree">Ladurée</option>
                <option value="sabrosa">Sabrosa</option>
                <option value="blue stars">Blue Stars Donuts & Coffee</option>
                <option value="krispy kreme">Krispy Kreme</option>
                <option value="compartes">Compartes</option>
                <option value="chobani">Chobani</option>
                <option value="sugarfina">Sugarfina</option>
                <option value="sweet paradise">Sweet Paradise</option>
                <option value="olipop">Olipop</option>
                <option value="tea forte">Tea Forte</option>
                <option value="gran blue kitchen">Gran Blue Kitchen</option>
              </select>
            </div>

            <div>
              <select id="categoryFilter" class="py-2 px-3 text-sm text-[#E55182] border border-pink-300 rounded-lg bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
                <option value="">All Categories</option>
                <option value="cookies">Cookies</option>
                <option value="donuts">Donuts</option>
                <option value="cakes & chocolates">Cakes & Chocolates</option>
                <option value="drinks & tea">Drinks & Tea</option>
                <option value="meals">Meals</option>
                <option value="we also have!">We also have!</option>
              </select>
            </div>

          </div>
        </div>

          <table class="w-full table-fixed text-sm text-left text-pink-900 mt-4">
            <thead class="text-xs uppercase bg-pink-100 text-pink-700">
              <tr>
                <th class="w-64 px-4 py-3 truncate">Product name</th>
                <th class="w-24 px-4 py-3 truncate">Category</th>
                <th class="w-24 px-4 py-3 truncate">Brand</th>
                <th class="w-24 px-4 py-3 truncate">Description</th>
                <th class="w-24 px-4 py-3 truncate">Price</th>
                <th class="w-24 px-4 py-3 truncate">Stock</th>
                <th class="w-10 px-4 py-3 truncate">Actions</th>
              </tr>
            </thead>
            <tbody id="product-list">
              @foreach($products as $product)
              <tr class="bg-white border-b border-pink-200 hover:bg-pink-50" data-category="{{ strtolower($product->category->name ?? 'uncategorized') }}" data-brand="{{ strtolower($product->store->name ?? 'uncategorized') }}">

                <td class="px-4 py-4 truncate text-pink-900 flex items-center gap-2 product-name">
                  <img src="{{ asset($product->product->image_URL) }}" class="bg-white w-8 h-8 object-contain rounded border" />
                  {{ $product->product->name }}
                </td>
                <td class="px-4 py-4 truncate">{{ $product->category->name ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $product->store->name ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $product->product->description ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $product->product->price }}</td>
                <td class="px-4 py-4 truncate">{{ $product->product->stock_Quantity }}</td>
                <td class="px-4 py-4 truncate">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                  </svg>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </main>

  </div>
</body>

<script>
document.addEventListener('DOMContentLoaded', function () {
  const categoryFilter = document.getElementById('categoryFilter');
  const brandFilter = document.getElementById('brandFilter');
  const searchInput = document.getElementById('table-search');
  const productList = document.getElementById('product-list');

  function filterTable() {
  const selectedCategory = categoryFilter.value.toLowerCase();
  const selectedBrand = brandFilter.value.toLowerCase().replace(/\s+/g, '').replace('&', 'and'); // Normalize selected brand
  const searchTerm = searchInput.value.toLowerCase();

  const rows = productList.querySelectorAll('tr');

  rows.forEach(row => {
    const rowCategory = row.getAttribute('data-category')?.toLowerCase() || '';
    const rowBrand = row.getAttribute('data-brand')?.toLowerCase().replace(/\s+/g, '').replace('&', 'and') || ''; // Normalize row brand
    const nameCell = row.querySelector('.product-name');
    const productName = nameCell?.textContent.toLowerCase() || '';

    console.log(`Filtering by Category: ${selectedCategory}, Brand: ${selectedBrand}, Search: ${searchTerm}`);
    console.log(`Row Category: ${rowCategory}, Row Brand: ${rowBrand}, Product Name: ${productName}`);

    const matchesCategory = !selectedCategory || rowCategory.includes(selectedCategory);
    const matchesBrand = !selectedBrand || rowBrand.includes(selectedBrand);
    const matchesSearch = !searchTerm || productName.includes(searchTerm);

    if (matchesCategory && matchesBrand && matchesSearch) {
      row.classList.remove('hidden');
    } else {
      row.classList.add('hidden');
    }
  });
}

  categoryFilter.addEventListener('change', filterTable);
  brandFilter.addEventListener('change', filterTable);
  searchInput.addEventListener('input', filterTable);
});

</script>

</html>
