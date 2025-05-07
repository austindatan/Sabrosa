<!DOCTYPE html>
<html lang="en">
  <head>
    @vite(['resources/js/dashboard_script.js']) 
    <title>Sabrosa Dashboard | Add Product</title>
    @include('pages.head')
  </head>
  <body class="bg-pink-50">

  <div class="app min-h-screen flex flex-col md:flex-row">

  @include('admin_side.sidebar')

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      <div class="flex justify-between items-center mb-4 gap-24">
        <h2 class="text-2xl font-bold text-right font-poppins">Add Product</h2>
      </div>

      <div class="mb-8">
        <form id="addProductForm" method="POST" action="{{ route('home') }}" enctype="multipart/form-data">
        @csrf
          <h3 class="text-xl font-semibold mb-4 font-poppins">Product Images</h3>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 w-full">
            <label class="relative w-full h-32 border-2 border-dashed border-gray-300 rounded-lg bg-white flex items-center justify-center hover:border-[#f8c9d8] cursor-pointer overflow-hidden">
              <img id="productPhotoPreview1" src="placeholder.jpg" alt="Product Photo 1" class="font-dm-sans max-w-full max-h-full object-cover pointer-events-none">
              <input type="file" id="productPhoto1" name="productPhoto1" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
            </label>

            <label class="relative w-full h-32 border-2 border-dashed border-gray-300 rounded-lg bg-white flex items-center justify-center hover:border-[#f8c9d8] cursor-pointer overflow-hidden">
              <img id="productPhotoPreview2" src="placeholder.jpg" alt="Product Photo 2" class="font-dm-sans max-w-full max-h-full object-cover pointer-events-none">
              <input type="file" id="productPhoto2" name="productPhoto2" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
            </label>
          </div>
        </div>

        <div class="mb-5 flex flex-col">
          <label for="productDescription" class="font-semibold mb-2 font-poppins">Product Name</label>
          <input id="productName" name="productName" rows="4" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
        </div>

      <div class="mb-5 flex flex-col">
          <label for="productBrand" class="font-semibold mb-2 font-poppins">Brand <span class="text-red-500">*</span></label>
          <select id="productBrand" name="productBrand" required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
            <option value="">Select a brand</option>
            <option value="Sweets Paradise">Sweets Paradise</option>
            <option value="Byron Bay">Byron Bay</option>
            <option value="Krispy Kreme">Krispy Kreme</option>
            <option value="Olipop">Olipop</option>
            <option value="Tea Forte">Tea Forte</option>
            <option value="Compartes">Compartes</option>
            <option value="Sugarfina">Sugarfina</option>
            <option value="Chobani">Chobani</option>
            <option value="Laduree">Laduree</option>
            <option value="Bluestar">Bluestar</option>
            <option value="Graze">Graze</option>
            <option value="Granblue Kitchen">Granblue Kitchen</option>
          </select>
        </div>

        <div class="mb-5 flex flex-col">
          <label for="productDescription" class="font-semibold mb-2 font-poppins">Description</label>
          <textarea id="productDescription" name="productDescription" rows="4" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></textarea>
        </div>

        <div class="mb-5 flex flex-col">
          <label for="productWeight" class="font-semibold mb-2 font-poppins">Weight (kg)</label>
          <input type="number" id="productWeight" name="productWeight" step="0.01" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
        </div>

        <div class="mb-5">
          <label class="font-semibold mb-2 block font-poppins">Price & Availability <span class="text-red-500">*</span></label>
          <div class="flex flex-wrap items-center gap-5">

            <div class="flex gap-2">
              <input type="number" id="productPrice" name="productPrice" required class="p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
              <select id="currency" name="currency" class="p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8] max-w-[80px]">
                <option value="USD">$</option>
                <option value="PHP">₱</option>
                <option value="EUR">€</option>
              </select>
            </div>

            <div class="flex items-center gap-3">
              <label class="relative inline-block w-[50px] h-[26px]">
                <input type="checkbox" id="productAvailability" name="productAvailability" class="opacity-0 w-0 h-0 peer" checked>
                <span class="absolute cursor-pointer top-0 left-0 right-0 bottom-0 bg-gray-300 rounded-full transition peer-checked:bg-[#f8c9d8]"></span>
                <span class="absolute left-[4px] bottom-[3px] w-[20px] h-[20px] bg-white rounded-full transition peer-checked:translate-x-[24px]"></span>
              </label>
              <span class="text-sm text-[#4d2c3d]">Enabled</span>
            </div>
          </div>
        </div>

        <div class="mb-5 flex flex-col">
          <label for="stockQuantity" class="font-semibold mb-2 font-poppins">Stock Quantity</label>
          <input type="number" id="stockQuantity" name="stockQuantity" min="0" class="p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
        </div>

        <button type="submit" class="font-poppins bg-[#f8c9d8] hover:bg-[#e4a6b8] text-[#4d2c3d] px-6 py-3 text-base rounded-lg font-medium transition-colors">
          Add Product
        </button>
      </form>
    </main>

  </div>
</body>

</html>
