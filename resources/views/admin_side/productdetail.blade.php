<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Product | {{ $product->name }}</title>
  @include('pages.head')
</head>
<body class="bg-pink-50">
  <div class="app min-h-screen flex flex-col md:flex-row">
    @include('admin_side.sidebar')

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-4xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      
      {{-- Header with title and delete button --}}
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-[#E55182]">Edit Product</h1>
        <form action="{{ route('admin.deleteproduct', $product->product_ID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-full hover:bg-red-600 transition">
            Delete Product
          </button>
        </form>
      </div>

      <form action="{{ route('admin.updateproduct', $product->product_ID) }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 gap-6">
        @csrf
        @method('PUT')

        {{-- Main Image Upload --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Main Image (image_URL)</label>
          <input type="file" name="image_URL" accept="image/*" class="border rounded p-2 w-full">
          @if($product->image_URL)
            <img src="{{ asset($product->image_URL) }}" alt="Main Image" class="mt-2 w-40 h-40 object-contain border rounded">
          @endif
        </div>

        {{-- Display Image Upload --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Display Image (image_display)</label>
          <input type="file" name="image_display" accept="image/*" class="border rounded p-2 w-full">
          @if($product->image_display)
            <img src="{{ asset($product->image_display) }}" alt="Display Image" class="mt-2 w-40 h-40 object-contain border rounded">
          @endif
        </div>

        {{-- Product Name --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Product Name</label>
          <input type="text" name="name" value="{{ $product->name }}" class="w-full border border-pink-300 rounded px-4 py-2 bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
        </div>

        {{-- Category Dropdown --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Category</label>
          <select name="category_ID" class="w-full border border-pink-300 rounded px-4 py-2 bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
            @foreach($categories as $category)
              <option value="{{ $category->category_ID }}" {{ $category->category_ID == $productDetails->category_ID ? 'selected' : '' }}>
                {{ $category->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Store Dropdown --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Store</label>
          <select name="store_ID" class="w-full border border-pink-300 rounded px-4 py-2 bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
            @foreach($stores as $store)
              <option value="{{ $store->store_ID }}" {{ $store->store_ID == $productDetails->store_ID ? 'selected' : '' }}>
                {{ $store->name }}
              </option>
            @endforeach
          </select>
        </div>

        {{-- Description --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Description</label>
          <textarea name="description" rows="4" class="w-full border border-pink-300 rounded px-4 py-2 bg-pink-50 focus:ring-pink-500 focus:border-pink-500">{{ $product->description }}</textarea>
        </div>

        {{-- Price --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Price (₱)</label>
          <input type="number" step="0.01" name="price" value="{{ $product->price }}" class="w-full border border-pink-300 rounded px-4 py-2 bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
        </div>

        {{-- Stock Quantity --}}
        <div>
          <label class="block font-semibold mb-1 text-pink-800">Stock Quantity</label>
          <input type="number" name="stock_quantity" value="{{ $product->stock_quantity }}" class="w-full border border-pink-300 rounded px-4 py-2 bg-pink-50 focus:ring-pink-500 focus:border-pink-500">
        </div>

        {{-- Bottom Buttons --}}
        <div class="mt-6 flex justify-between">
          <a href="{{ route('admin.productlist') }}" class="text-[#E55182] hover:underline">← Back to Product List</a>
          <button type="submit" class="bg-[#E55182] text-white px-6 py-2 rounded-full hover:bg-pink-600 transition">
            Save Changes
          </button>
        </div>
      </form>
    </main>
  </div>
</body>
</html>
