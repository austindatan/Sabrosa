<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Profiles</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 px-4 sm:px-6 py-6 max-w-full sm:max-w-3xl lg:max-w-6xl mx-auto mt-20 sm:mt-[200px] mb-12 sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      <!-- LEFT SIDE: Profile Info -->
      <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-right font-poppins">Profile</h2>
        </div>

        <!-- Account Info -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="flex items-center justify-between mb-4 gap-60">
            <h2 class="text-lg font-semibold text-left">Account Information</h2>
            <button class="text-sm text-blue-600 hover:underline" onclick="showPopup()">
              <svg class="h-6 w-6 text-gray-950" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
              </svg>
            </button>
          </div>

          <div class="space-y-4">
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Name</span>
              <span id="displayName" class="text-gray-900 font-medium">{{ $customer->firstname }} {{ $customer->lastname }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Email</span>
              <span id="displayEmail" class="text-gray-900 font-medium">{{ $customer->email }}</span>
            </div>
            <div class="flex items-center justify-between">
              <span class="text-gray-600">Phone Number</span>
              <span id="displayPhone" class="text-gray-900 font-medium">{{ $customer->phone }}</span>
            </div>
          </div>
        </div>

        <!-- Addresses -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <div class="flex items-center justify-between mb-4">
            <h3 class="text-md font-semibold">Addresses</h3>
            <button class="text-sm text-blue-600 hover:underline font-medium">+ Add</button>
          </div>
          <div class="border border-dashed border-gray-300 p-4 rounded-md text-gray-500 flex items-center gap-2">
            <span>ℹ️</span>
            <span>No addresses added</span>
          </div>
        </div>

        <!-- Settings -->
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <h2 class="text-lg font-semibold text-left mb-4">Account Settings</h2>
          <div class="flex items-center justify-between mb-4">
            <button onclick="showPasswordPopup()" class="text-gray-600 hover:underline">Change Password</button>
          </div>
          <div class="flex items-center justify-between">
            <button onclick="showDeletePopup()" class="text-red-600 hover:underline">Delete Account</button>
          </div>
        </div>
      </div>

      <!-- RIGHT SIDE: Order History -->
      <div class="col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2 w-full">
        <h2 class="text-xl font-poppins font-semibold text-left">Order History</h2>
        <div class="space-y-4 font-dm-sans">
          <!-- Sample Static Items -->
          <div class="flex items-center justify-between">
            <div class="flex items-center gap-3 relative">
              <div class="relative">
                <img src="{{ asset('images/product/product_sprites/Way of the Strong Special Mixed Yakisoba.png') }}" class="bg-white w-14 h-14 object-contain rounded border" />
                <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">1</span>
              </div>
              <p class="text-sm text-left w-[150px]">Way of the Strong Special Mixed Yakisoba</p>
            </div>
            <p class="text-sm font-semibold">P145</p>
          </div>
          <!-- Repeat sample as needed -->
        </div>
        <div class="mt-6 flex justify-end">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="font-dm-sans px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </main>

  <!-- Edit Profile Popup -->
  <div id="popup" class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="bg-white border-2 border-[#E55182] rounded-lg p-6 w-96 shadow-lg">
      <h3 class="text-xl font-semibold mb-4">Edit Profile</h3>
      <form id="editProfileForm" onsubmit="updateProfile(event)">
        <div class="mb-4">
          <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
          <input type="text" id="name" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-md" />
        </div>
        <div class="mb-4">
          <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md" />
        </div>
        <div class="mb-4">
          <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
          <input type="text" id="phone" name="phone" class="w-full px-3 py-2 border border-gray-300 rounded-md" />
        </div>
        <div class="flex justify-between">
          <button type="button" onclick="closePopup()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
          <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-md">Save</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Change Password Popup -->
  <div id="passwordPopup" class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="bg-white border-2 border-[#E55182] rounded-lg p-6 w-96 shadow-lg">
      <h3 class="text-xl font-semibold mb-4">Change Password</h3>
      <form id="changePasswordForm" onsubmit="submitPasswordChange(event)">
        <div class="mb-4">
          <label for="currentPassword" class="block text-sm font-medium text-gray-700">Current Password</label>
          <input type="password" id="currentPassword" name="currentPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md" required />
        </div>
        <div class="mb-4">
          <label for="newPassword" class="block text-sm font-medium text-gray-700">New Password</label>
          <input type="password" id="newPassword" name="newPassword" class="w-full px-3 py-2 border border-gray-300 rounded-md" required />
        </div>
        <div class="flex justify-between">
          <button type="button" onclick="closePasswordPopup()" class="bg-gray-500 text-white px-4 py-2 rounded-md">Cancel</button>
          <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-md">Change</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Account Popup -->
  <div id="deletePopup" class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="bg-white border-2 border-[#E55182] rounded-lg p-6 w-96 shadow-lg text-center">
      <h3 class="text-xl font-semibold mb-4">Are you sure you want to delete your account?</h3>
      <div class="flex justify-center gap-4">
        <button onclick="confirmDelete()" class="bg-red-500 text-white px-4 py-2 rounded-md">Yes</button>
        <button onclick="closeDeletePopup()" class="bg-gray-500 text-white px-4 py-2 rounded-md">No</button>
      </div>
    </div>
  </div>

  <script>
    const customerData = {
      name: @json($customer->firstname . ' ' . $customer->lastname),
      email: @json($customer->email),
      phone: @json($customer->phone)
    };

    function showPopup() {
      document.getElementById('popup').classList.remove('hidden');
      document.getElementById('name').value = customerData.name;
      document.getElementById('email').value = customerData.email;
      document.getElementById('phone').value = customerData.phone;
    }

    function closePopup() {
      document.getElementById('popup').classList.add('hidden');
    }

    function updateProfile(event) {
      event.preventDefault();
      document.getElementById('displayName').textContent = document.getElementById('name').value;
      document.getElementById('displayEmail').textContent = document.getElementById('email').value;
      document.getElementById('displayPhone').textContent = document.getElementById('phone').value;
      closePopup();
    }

    function showPasswordPopup() {
      document.getElementById('passwordPopup').classList.remove('hidden');
    }

    function closePasswordPopup() {
      document.getElementById('passwordPopup').classList.add('hidden');
    }

    function submitPasswordChange(event) {
      event.preventDefault();
      alert("Password changed successfully!");
      closePasswordPopup();
    }

    function showDeletePopup() {
      document.getElementById('deletePopup').classList.remove('hidden');
    }

    function closeDeletePopup() {
      document.getElementById('deletePopup').classList.add('hidden');
    }

    function confirmDelete() {
      alert("Account deleted.");
      closeDeletePopup();
    }
  </script>
</body>
</html>
