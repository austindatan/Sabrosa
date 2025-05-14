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

    <form id="addProductForm" method="POST" action="{{ route('admin.storeProduct') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-8">
        <h3 class="text-xl font-semibold mb-4 font-poppins">Product Images</h3>
        <div class="flex flex-col md:flex-row gap-4 mb-6">

          <!-- Product Photo 1 -->
          <div class="relative group w-full md:w-1/2 h-32 border-2 border-dashed border-gray-300 rounded-lg bg-white overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
              <div class="text-center text-gray-400 font-poppins text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2-3h6l2 3h4v13H3V7z" />
                  <circle cx="12" cy="13" r="3" stroke="currentColor" stroke-width="2" />
                </svg>
                Add Photo
              </div>
            </div>
            <img id="productPhotoPreview1" src="placeholder.jpg" alt="Product Photo 1" class="w-full h-full object-cover pointer-events-auto cursor-pointer" onclick="showModal(this.src)">
            <input type="file" id="productPhoto1" name="productPhoto1" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
            <button type="button" onclick="resetImage('productPhoto1', 'productPhotoPreview1')" class="absolute top-1 right-1 bg-white rounded-full p-1 hover:bg-gray-100 transition-opacity opacity-0 group-hover:opacity-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#E55182]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>

          <!-- Product Photo 2 -->
          <div class="relative group w-full md:w-1/2 h-32 border-2 border-dashed border-gray-300 rounded-lg bg-white overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
              <div class="text-center text-gray-400 font-poppins text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-1 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2-3h6l2 3h4v13H3V7z" />
                  <circle cx="12" cy="13" r="3" stroke="currentColor" stroke-width="2" />
                </svg>
                Add Photo
              </div>
            </div>
            <img id="productPhotoPreview2" src="placeholder.jpg" alt="Product Photo 2" class="w-full h-full object-cover pointer-events-auto cursor-pointer" onclick="showModal(this.src)">
            <input type="file" id="productPhoto2" name="productPhoto2" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer">
            <button type="button" onclick="resetImage('productPhoto2', 'productPhotoPreview2')" class="absolute top-1 right-1 bg-white rounded-full p-1 hover:bg-gray-100 transition-opacity opacity-0 group-hover:opacity-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#E55182]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="mb-5 flex flex-col">
        <label for="productName" class="font-semibold mb-2 font-poppins">Product Name</label>
        <input id="productName" name="productName" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
      </div>

      <div class="mb-5 flex flex-col">
        <label for="store_id" class="font-semibold mb-2 font-poppins">Brand <span class="text-red-500">*</span></label>
        <select id="store_id" name="store_id" required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
          <option value="">Select a brand</option>
          <option value="10">Sweets Paradise</option>
          <option value="1">Byron Bay</option>
          <option value="6">Krispy Kreme</option>
          <option value="11">Olipop</option>
          <option value="12">Tea Forte</option>
          <option value="7">Compartes</option>
          <option value="9">Sugarfina</option>
          <option value="8">Chobani</option>
          <option value="3">Laduree</option>
          <option value="4">Sabrosa</option>
          <option value="5">Bluestar</option>
          <option value="2">Graze</option>
          <option value="13">Granblue Kitchen</option>
        </select>

        <div class="mb-5 flex flex-col mt-4">
          <label for="category_id" class="font-semibold mb-2 font-poppins">Category <span class="text-red-500">*</span></label>
          <select id="category_id" name="category_id" required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
            <option value="">Select a category</option>
            <option value="1">Cookies</option>
            <option value="2">Donuts</option>
            <option value="3">Cakes & Chocolates</option>
            <option value="4">Drinks & Tea</option>
            <option value="5">Meals</option>
            <option value="6">We Also Have!</option>
          </select>
        </div>
      </div>

      <div class="mb-5 flex flex-col">
        <label for="productDescription" class="font-semibold mb-2 font-poppins">Description</label>
        <textarea id="productDescription" name="productDescription" rows="4" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]"></textarea>
      </div>

      <div class="mb-5 flex flex-col">
        <label for="productWeight" class="font-semibold mb-2 font-poppins">Weight (kg)</label>
        <input type="number" id="productWeight" name="productWeight" step="0.01" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
      </div>
      
      <div class="flex flex-row gap-5">
        <div class="mb-5">
          <label class="font-semibold mb-2 block font-poppins">Price <span class="text-red-500">*</span></label>
          <div class="flex flex-wrap items-center gap-5">
            <div class="flex gap-2">
              <div class="flex items-center border border-gray-300 rounded-lg p-2.5 text-sm bg-white text-[#4d2c3d]">
                <span class="text-xl">₱</span>
              </div>
              <input type="number" id="productPrice" name="productPrice" required class="p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
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
</div>

      <button type="button" id="addProductBtn" class="font-poppins bg-[#f8c9d8] hover:bg-[#e4a6b8] text-[#4d2c3d] px-6 py-3 text-base rounded-lg font-medium transition-colors">
        Add Product
      </button>
    </form>
  </main>
</div>

<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
  <span onclick="closeModal()" class="absolute top-4 right-6 text-white text-3xl cursor-pointer">&times;</span>
  <img id="modalImage" src="" class="max-w-full max-h-[90vh] rounded-lg shadow-xl border-4 border-white">
</div>

<div id="confirmationModal" class="fixed inset-0 flex justify-center items-center hidden z-50">
  <div class="bg-white p-6 rounded-lg shadow-lg max-w-xs w-full border-2 border-[#E55182]">
    <h3 class="text-xl font-poppins font-semibold text-center mb-4">Are you sure you want to add this product?</h3>
    <div class="flex justify-around">
      <button id="confirmButton" class="bg-[#f8c9d8] text-[#4d2c3d] px-4 py-2 rounded-lg hover:bg-[#e4a6b8]">Yes</button>
      <button id="cancelButton" class="bg-[#f8c9d8] text-[#4d2c3d] px-4 py-2 rounded-lg hover:bg-[#e4a6b8]">No</button>
    </div>
  </div>
</div>

<script>
function resetImage(inputId, previewId) {
  const input = document.getElementById(inputId);
  const preview = document.getElementById(previewId);
  input.value = "";
  preview.src = "placeholder.jpg";
}

function previewImage(inputId, previewId) {
  const input = document.getElementById(inputId);
  const preview = document.getElementById(previewId);
  input.addEventListener('change', function () {
    const file = input.files[0];
    if (file) {
      preview.src = URL.createObjectURL(file);
    }
  });
}

function showModal(imageSrc) {
  const modal = document.getElementById("imageModal");
  const modalImg = document.getElementById("modalImage");
  modalImg.src = imageSrc;
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeModal() {
  const modal = document.getElementById("imageModal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

document.addEventListener('DOMContentLoaded', function () {
  previewImage('productPhoto1', 'productPhotoPreview1');
  previewImage('productPhoto2', 'productPhotoPreview2');
});
</script>

<script>
document.getElementById('addProductBtn').addEventListener('click', function () {
  // Validate required fields
  let isFormValid = true;
  const requiredFields = document.querySelectorAll('#addProductForm input[required], #addProductForm select[required], #addProductForm textarea[required]');
  
  requiredFields.forEach(function (field) {
    if (!field.value.trim()) {
      isFormValid = false;
      field.classList.add('border-red-500');
    } else {
      field.classList.remove('border-red-500');
    }
  });

  if (!isFormValid) {
    alert("Please fill in all required fields.");
  } else {
    document.getElementById('confirmationModal').classList.remove('hidden');
  }
});

// Confirm submission
document.getElementById('confirmButton').addEventListener('click', function () {
  document.getElementById('addProductForm').submit();
});

// Cancel submission
document.getElementById('cancelButton').addEventListener('click', function () {
  document.getElementById('confirmationModal').classList.add('hidden');
});

</script>

</body>
</html>
