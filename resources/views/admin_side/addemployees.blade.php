<!DOCTYPE html>
<html lang="en">
  <head>
    @vite(['resources/js/dashboard_script.js']) 
    <title>Sabrosa Dashboard | Add Employee</title>
    @include('pages.head')
  </head>
  <body class="bg-pink-50">

  <div class="app min-h-screen flex flex-col md:flex-row">

  @include('admin_side.sidebar')

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      <div class="flex justify-between items-center mb-4 gap-24">
        <h2 class="text-2xl font-bold text-right font-poppins">Add Employee</h2>
      </div>

      <div class="mb-5 flex flex-row gap-4">
        <div class="flex flex-col w-1/3">
          <label for="productDescription" class="font-semibold mb-2 font-poppins">First Name</label>
          <input id="productDescription" name="productDescription" rows="1" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
        </div>

        <div class="flex flex-col w-1/3">
          <label for="productDescription" class="font-semibold mb-2 font-poppins">Middle Name</label>
          <input id="productDescription" name="productDescription" rows="1" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
        </div>

        <div class="flex flex-col w-1/3">
          <label for="productDescription" class="font-semibold mb-2 font-poppins">Last Name</label>
          <input id="productDescription" name="productDescription" rows="1" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
        </div>
      </div>

        <div class="mb-5 flex flex-col">
          <label for="productWeight" class="font-semibold mb-2 font-poppins">Position</label>
          <input type="number" id="productWeight" name="productWeight" step="0.01" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
        </div>

        <div class="mb-5 flex flex-col">
          <label for="productDescription" class="font-semibold mb-2 font-poppins">Job Description</label>
          <textarea id="productDescription" name="productDescription" rows="4" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></textarea>
        </div>

        <div class="mb-5 flex flex-col">
          <label for="productWeight" class="font-semibold mb-2 font-poppins">Salary Grade</label>
          <input type="number" id="productWeight" name="productWeight" step="0.01" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
        </div>

        <div class="mb-5 flex flex-row gap-4">
          <div class="flex flex-col w-1/3">
            <label for="productDescription" class="font-semibold mb-2 font-poppins">Province</label>
            <input id="productDescription" name="productDescription" rows="1" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
          </div>

          <div class="flex flex-col w-1/3">
            <label for="productDescription" class="font-semibold mb-2 font-poppins">City</label>
            <input id="productDescription" name="productDescription" rows="1" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
          </div>

          <div class="flex flex-col w-1/3">
            <label for="productDescription" class="font-semibold mb-2 font-poppins">Barangay</label>
            <input id="productDescription" name="productDescription" rows="1" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></input>
          </div>
        </div>

        <button type="submit" class="font-poppins bg-[#f8c9d8] hover:bg-[#e4a6b8] text-[#4d2c3d] px-6 py-3 text-base rounded-lg font-medium transition-colors">
          Add Product
        </button>

    </main>

  </div>
</body>

</html>
