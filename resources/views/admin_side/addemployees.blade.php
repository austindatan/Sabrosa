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
    <form method="POST" action="{{ route('admin.storeEmployees') }}" enctype="multipart/form-data">
      @csrf
    <div class="mb-5 flex flex-row gap-4">
      <div class="flex flex-col w-1/3">
        <label for="firstName" class="font-semibold mb-2 font-poppins">First Name
          <span class="text-red-500">*</span>
        </label>
        <input id="firstName" name="firstName" required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" placeholder="Enter first name">
      </div>

      <div class="flex flex-col w-1/3">
        <label for="middleName" class="font-semibold mb-2 font-poppins">Middle Name</label>
        <input id="middleName" name="middleName" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" placeholder="Enter middle name">
      </div>

      <div class="flex flex-col w-1/3">
        <label for="lastName" class="font-semibold mb-2 font-poppins">Last Name
          <span class="text-red-500">*</span>
        </label>
        <input id="lastName" name="lastName" required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" placeholder="Enter last name">
      </div>
    </div>

        <!-- Start of new row with 4 columns for the address fields -->
        <div class="mb-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
          <div class="flex flex-col">
            <label for="street" class="font-semibold mb-2 font-poppins">Street</label>
            <input id="street" name="street" placeholder="Enter street" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" />
          </div>

          <div class="flex flex-col relative">
            <label for="city" class="font-semibold mb-2 font-poppins">City</label>
            <span class="absolute top-0 right-53 text-red-500 text-lg">*</span>
            <input id="city" name="city" required placeholder="Enter city" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" />
          </div>

          <div class="flex flex-col relative">
            <label for="province" class="font-semibold mb-2 font-poppins">Province</label><span class="absolute top-0 right-42 text-red-500 text-lg">*</span>
            <input id="province" name="province"  placeholder="Enter province"  required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" />
          </div>

          <div class="flex flex-col relative">
            <label for="country" class="font-semibold mb-2 font-poppins">Country</label>
            <span class="absolute top-0 right-44 text-red-500 text-lg">*</span>
            <input id="country" name="country" required placeholder="Enter country" class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]" />
          </div>
        </div>

        
      <div class="mb-5 flex flex-col">
        <label for="position" class="font-semibold mb-2 font-poppins">Position<span class="text-red-500">*</span></label>
        <select id="position" name="position" required class="font-dm-sans p-2.5 border border-gray-300 rounded-lg text-sm bg-white text-[#4d2c3d] focus:outline-none focus:border-[#f8c9d8]">
          <option value="">Select a position</option>
          <option value="1">Delivery Rider</option>
          <option value="2">Customer Support Representative</option>
          <option value="3">Web Developer (Frontend/Backend)</option>
          <option value="4">Product Manager</option>
          <option value="5">Logistics Coordinator</option>
          <option value="6">Data Analyst</option>
          <option value="7">Marketing Specialist</option>
        </select>

        <button type="button" id="addEmployeeBtn" class="font-poppins bg-[#f8c9d8] hover:bg-[#e4a6b8] text-[#4d2c3d] px-6 py-3 text-base rounded-lg font-medium transition-colors">
          Add Employee
        </button>
      </form>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="fixed inset-0 flex justify-center items-center hidden z-50">
  <div class="bg-white p-6 rounded-lg shadow-lg max-w-xs w-full border-2 border-[#E55182]">
    <h3 class="text-xl font-poppins font-semibold text-center mb-4">Are you sure you want to add this employee?</h3>
    <div class="flex justify-around">
      <button id="confirmButton" class="bg-[#f8c9d8] text-[#4d2c3d] px-4 py-2 rounded-lg hover:bg-[#e4a6b8]">Yes</button>
      <button id="cancelButton" class="bg-[#f8c9d8] text-[#4d2c3d] px-4 py-2 rounded-lg hover:bg-[#e4a6b8]">No</button>
    </div>
  </div>
</div>

  <script>
  document.getElementById('addEmployeeBtn').addEventListener('click', function() {
    // Check if any required fields are empty
    var isFormValid = true;
    var requiredFields = document.querySelectorAll('input[required], textarea[required]');
    
    requiredFields.forEach(function(field) {
      if (!field.value.trim()) {
        isFormValid = false;
        field.classList.add('border-red-500'); // Add red border to highlight missing fields
      } else {
        field.classList.remove('border-red-500'); // Remove red border if filled
      }
    });

    if (!isFormValid) {
      // Show an alert or message prompting the user to fill the required fields
      alert("Please fill in all required fields.");
    } else {
      // Show the confirmation modal if the form is valid
      document.getElementById('confirmationModal').classList.remove('hidden');
    }
  });

  // Handle the "Yes" button click
  document.getElementById('confirmButton').addEventListener('click', function() {
    // Perform the form submission
    document.getElementById('addEmployeeForm').submit();
    // Hide the modal after submission
    document.getElementById('confirmationModal').classList.add('hidden');
  });

  // Handle the "No" button click
  document.getElementById('cancelButton').addEventListener('click', function() {
    // Close the modal without submitting
    document.getElementById('confirmationModal').classList.add('hidden');
  });
</script>

</body>
</html>
