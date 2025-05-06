<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Employee</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @vite(['resources/css/app.css', 'resources/js/AddEmployee.js'])
</head>
<body class="bg-gray-100 font-sans">
  <!-- Topbar -->
  <div class="flex justify-between items-center bg-white px-6 py-4 shadow-md">
    <div class="flex items-center gap-4">
      <img src="images/logo.png" alt="Sabrosa Logo" class="h-10" />
    </div>
    <div class="flex items-center gap-3">
      <input type="text" placeholder="Search..." class="border border-gray-300 rounded px-3 py-1" />
      <button class="text-xl">🔍</button>
      <span class="text-xl">🔔</span>
      <span class="text-xl">👤</span>
    </div>
  </div>

  <body class="bg-pink-50">

<div class="app min-h-screen flex flex-col md:flex-row">

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
    <main class="flex-1 p-8">
      <h1 class="text-2xl font-semibold mb-6">Add New Employee</h1>

      <div class="bg-white p-6 rounded shadow-md">
        <!-- Photo Upload -->
        <div class="flex justify-center mb-6">
          <label for="employeePhoto" class="cursor-pointer text-center">
            <img id="employeePhotoPreview" src="placeholder.jpg" alt="Employee Photo" class="w-32 h-32 rounded-full object-cover mx-auto" />
            <div class="mt-2 text-sm text-blue-500 hover:underline">Upload Photo</div>
          </label>
          <input type="file" id="employeePhoto" accept="image/*" class="hidden" />
        </div>

        <!-- Form -->
        <form id="employeeForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <label for="firstName" class="block font-medium">First Name<span class="text-red-500">*</span></label>
            <input type="text" id="firstName" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="middleName" class="block font-medium">Middle Name</label>
            <input type="text" id="middleName" class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="lastName" class="block font-medium">Last Name<span class="text-red-500">*</span></label>
            <input type="text" id="lastName" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="employeeId" class="block font-medium">Employee ID<span class="text-red-500">*</span></label>
            <input type="text" id="employeeId" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="email" class="block font-medium">Email<span class="text-red-500">*</span></label>
            <input type="email" id="email" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="address" class="block font-medium">Address<span class="text-red-500">*</span></label>
            <input type="text" id="address" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="phoneNumber" class="block font-medium">Phone Number<span class="text-red-500">*</span></label>
            <input type="tel" id="phoneNumber" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="birthday" class="block font-medium">Birthday<span class="text-red-500">*</span></label>
            <input type="date" id="birthday" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="age" class="block font-medium">Age<span class="text-red-500">*</span></label>
            <input type="number" id="age" readonly required class="w-full border rounded px-3 py-2 bg-gray-100" />
          </div>
          <div>
            <label for="jobPosition" class="block font-medium">Job Position<span class="text-red-500">*</span></label>
            <input type="text" id="jobPosition" required class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="employeeType" class="block font-medium">Employee Type<span class="text-red-500">*</span></label>
            <select id="employeeType" required class="w-full border rounded px-3 py-2">
              <option value="">- Select -</option>
              <option value="Employee">Employee</option>
              <option value="Contractor">Contractor</option>
              <option value="Intern">Intern</option>
            </select>
          </div>
          <div>
            <label for="employeeStatus" class="block font-medium">Employee Status<span class="text-red-500">*</span></label>
            <select id="employeeStatus" required class="w-full border rounded px-3 py-2">
              <option value="">- Select -</option>
              <option value="Full-Time">Full-Time</option>
              <option value="Part-Time">Part-Time</option>
              <option value="Contract">Contract</option>
            </select>
          </div>
          <div>
            <label for="employeeEndDate" class="block font-medium">Employee End Date</label>
            <input type="date" id="employeeEndDate" class="w-full border rounded px-3 py-2" />
          </div>
          <div>
            <label for="dateOfHire" class="block font-medium">Date of Hire<span class="text-red-500">*</span></label>
            <input type="date" id="dateOfHire" required class="w-full border rounded px-3 py-2" />
          </div>

          <!-- Submit Button -->
          <div class="md:col-span-2 text-center mt-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
              Create Employee
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <script src="js/AddEmployee.js"></script>
</body>
</html>
