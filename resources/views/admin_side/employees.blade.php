<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    @vite(['resources/css/app.css', 'resources/js/EmployeeDetails.js']) 
    <title>Web Analytics Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('images/sabrosa_stable_logo.png') }}">
  </head>
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

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg">
  <div class="content">
<!-- Page Title -->
<div class="mb-6">
  <h1 class="text-3xl font-bold text-[#1F27A6]">Employees</h1>
</div>


    <!-- Employee Table -->
    <div class="overflow-x-auto bg-white">
      <table class="text-sm min-w-full table-auto">
        <thead class="bg-pink-100 text-[#1F27A6] text-center">
          <tr>
            <th class="px-4 py-3 border">Employee ID</th>
            <th class="px-4 py-3 border">First Name</th>
            <th class="px-4 py-3 border">Last Name</th>
            <th class="px-4 py-3 border">Email</th>
            <th class="px-4 py-3 border">Phone Number</th>
            <th class="px-4 py-3 border">Job Position</th>
            <th class="px-4 py-3 border">Status</th>
            <th class="px-4 py-3 border">Action</th>
          </tr>
        </thead>
        <tbody id="employeeTableBody" class="bg-gray-50 text-center">
          <!-- Dynamic content will go here -->
        </tbody>
      </table>
    </div>
  </div>
  </div>
  <!-- Fixed Create Button (Bottom Right) -->
<div class="fixed bottom-6 right-6 z-50">
  <button
    id="createNewEmployee"
    class="bg-[#1F27A6] hover:bg-[#182089] text-white font-semibold px-6 py-3 rounded-lg transition duration-300"
  >
    + Create New Employee
  </button>
</div>
</body>
</html>
