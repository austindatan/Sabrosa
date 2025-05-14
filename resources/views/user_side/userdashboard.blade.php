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
    <form action="{{ route('user.update', $customer->customer_ID) }}" method="POST" class="space-y-6">
    @csrf
      <div>
        <div class="w-full border border-gray-200 rounded-lg p-4 mb-4">
          <h3 class="text-lg text-left font-semibold mb-4">Address</h3>
          @foreach(['street', 'barangay', 'city', 'province', 'country', 'company'] as $field)
            <div class="relative">
              <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $customer->$field) }}"
                class="peer mb-4 w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                readonly style="background-color: white; cursor: not-allowed;" />
              <label for="{{ $field }}"
                class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                {{ ucwords(str_replace('_', ' ', $field)) }} {{ in_array($field, ['phone', 'company']) ? '(Optional)' : '' }}
              </label>
              <button type="button" onclick="toggleEdit('{{ $field }}')"
                class="absolute right-2 top-1/4 -translate-y-1/2 text-pink-500 text-lg transition duration-200 ease-in-out 
                hover:bg-pink-200 hover:rounded-lg hover:px-1 hover:text-pink-700 
                active:bg-pink-500 active:text-white cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>
              </button>
            </div>
          @endforeach
          <div class="text-right">
            <button type="submit"
              class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-md text-lg font-semibold">
              Save Changes
            </button>
          </div>
        </form>
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
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="font-dm-sans px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">
                        Logout
                    </button>
                </form>
            </div>
            
        </div>
      </div>

      <!-- RIGHT SIDE: Order History -->
      <div class="col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2 w-full">
  <h2 class="text-xl font-poppins font-semibold text-left">Order History</h2>
  <div class="space-y-4 font-dm-sans">
    @forelse($products as $product)
      <a href="{{ route('user.transactionHistory', ['id' => $product->transaction_id]) }}" class="block">
        <div class="flex justify-between hover:bg-gray-200 transition rounded-lg p-2">
          {{-- LEFT: Image + Text --}}
          <div class="flex items-start gap-3 w-full max-w-[80%]">
            <img src="{{ asset($product->image_URL) }}" alt="{{ $product->name }}"
              class="bg-white w-14 h-14 object-contain rounded border" />
            <div class="flex flex-col">
              <p class="text-sm text-left leading-snug break-words">
                {{ $product->name }}
              </p>
              <p class="text-xs text-left text-gray-500">Qty: {{ $product->quantity }}</p>
            </div>
          </div>

          {{-- RIGHT: Price --}}
          <div class="text-sm font-semibold text-right whitespace-nowrap">
            ₱{{ number_format($product->price, 2) }}
          </div>
        </div>
      </a>
    @empty
      <p class="text-gray-500">No past orders found.</p>
    @endforelse
  </div>
</div>
    </div>
  </main>

  <!-- Edit Profile Popup -->
  <div id="popup" class="fixed inset-0 flex items-center justify-center hidden z-50">
    <div class="bg-white border-2 border-[#E55182] rounded-lg p-6 w-96 shadow-lg">
      <h3 class="text-xl font-semibold mb-4">Edit Profile</h3>

      <form id="editProfileForm" action="{{ route('user.updatePopup', $customer->customer_ID) }}" method="POST">
  @csrf
  <div class="mb-4">
    <label for="firstname" class="block text-sm font-medium text-gray-700">First Name</label>
    <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $customer->firstname) }}"
           class="w-full px-3 py-2 border border-gray-300 rounded-md" required />
  </div>
  <div class="mb-4">
    <label for="lastname" class="block text-sm font-medium text-gray-700">Last Name</label>
    <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $customer->lastname) }}"
           class="w-full px-3 py-2 border border-gray-300 rounded-md" required />
  </div>
  <div class="mb-4">
    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
    <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}"
           class="w-full px-3 py-2 border border-gray-300 rounded-md" required />
  </div>
  <div class="mb-4">
    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
    <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}"
           class="w-full px-3 py-2 border border-gray-300 rounded-md" />
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

      <form method="POST" action="{{ route('user.change') }}">
  @csrf
                <!-- ✅ Username Field -->
                <div class="w-full mb-5">
                    <label for="username" class="block text-sm font-medium text-gray-700 font-dm-sans uppercase"> Username </label>
                    <input type="text" id="username" name="username" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <!-- ✅ Email Field -->
                <div class="w-full mb-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 font-dm-sans uppercase"> Email </label>
                    <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <!-- ✅ New Password Field -->
                <div class="w-full mb-5">
                    <label for="password" class="block text-sm font-medium text-gray-700 font-dm-sans uppercase"> New Password </label>
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <!-- ✅ Confirm Password Field -->
                <div class="w-full mb-5">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 font-dm-sans uppercase"> Confirm Password </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
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

    function toggleEdit(fieldId) {
        let field = document.getElementById(fieldId);
        let button = document.getElementById("btn-" + fieldId);

        if (field.readOnly) {
            field.readOnly = false;
            field.style.backgroundColor = "#FFF8F8"; // ✅ Highlight when editable
            field.style.cursor = "text";
            button.style.backgroundColor = "#E55182"; 
            button.style.color = "bg-pink-100"; // ✅ Active effect
            field.dataset.previousValue = field.value; // ✅ Store previous value before editing
        } else {
            field.readOnly = true;
            field.style.backgroundColor = "white"; 
            field.style.cursor = "not-allowed"; 
            button.style.backgroundColor = "transparent";
            button.style.color = "#E55182"; 

            // ✅ Ensure field doesn't revert back to original value
            if (field.value !== field.dataset.previousValue) {
                document.getElementById("save-form").dataset.edited = "true";
            }
        }
    }

  </script>
</body>
</html>
