<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      

      <!-- ✅ LEFT SIDE: FORM -->
      <div class="lg:col-span-2 space-y-10">
        <!-- ✅ Delivery Form -->
        <form method="POST" action="{{ route('delivery.update') }}" class="space-y-6">
          @csrf

          <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold font-poppins">Delivery</h2>
            <p class="text-sm text-gray-600 font-dm-sans">{{ old('email', $customer->email) }}</p>
          </div>

          <p class="text-base text-gray-600 font-dm-sans mx-auto">Express Checkout</p>

          <div class="grid grid-cols-3 gap-6 w-full font-dm-sans">
            <div class="flex justify-center items-center w-full">
              <a href="{{ route('checkout') }}">
                <img src="{{ asset('images/maya-3.png') }}" class="bg-[#00b464] w-full h-32 object-contain rounded cursor-pointer hover:scale-105 transition-transform" />
              </a>
            </div>
            
            <div class="flex justify-center items-center w-full">
              <a href="{{ route('checkout') }}">
                <img src="{{ asset('images/gcash-2.png') }}" class="bg-blue-300 w-full h-32 object-contain rounded cursor-pointer hover:scale-105 transition-transform" />
              </a>
            </div>
            
            <div class="flex justify-center items-center w-full">
              <a href="{{ route('checkout') }}">
                <img src="{{ asset('images/paypal.png') }}" class="bg-yellow-400 w-full h-32 object-contain rounded cursor-pointer hover:scale-105 transition-transform" />
              </a>
            </div>
          </div>

        <div class="flex items-center justify-center gap-6 my-8">
          <div class="flex-grow border-t border-gray-300"></div>
          <p class="text-base text-gray-600 font-dm-sans">OR</p>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

          <!-- ✅ Editable fields: name -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach(['firstname', 'middlename', 'lastname'] as $field)
              <div class="relative">
                <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $customer->$field) }}"
                  class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                  readonly style="background-color: white; cursor: not-allowed;" />
                <label for="{{ $field }}"
                  class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                  {{ ucwords(str_replace('_', ' ', $field)) }}
                </label>
                <button type="button" onclick="toggleEdit('{{ $field }}')"
                  class="absolute right-2 top-1 text-pink-500 text-lg">✏️</button>
              </div>
            @endforeach
          </div>

          <!-- ✅ Editable fields: address -->
          @foreach(['street', 'barangay', 'city', 'province', 'country', 'email', 'phone', 'company'] as $field)
            <div class="relative">
              <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ old($field, $customer->$field) }}"
                class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400"
                readonly style="background-color: white; cursor: not-allowed;" />
              <label for="{{ $field }}"
                class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                {{ ucwords(str_replace('_', ' ', $field)) }} {{ in_array($field, ['phone', 'company']) ? '(Optional)' : '' }}
              </label>
              <button type="button" onclick="toggleEdit('{{ $field }}')"
                class="absolute right-2 top-1 text-pink-500 text-lg transition duration-200 ease-in-out 
                hover:bg-pink-200 hover:rounded-lg hover:px-1 hover:text-pink-700 
                active:bg-pink-500 active:text-white cursor-pointer">
                ✏️
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

        <!-- ✅ Payment Tabs Below Form -->
        <div class="bg-gray-100 p-6 rounded-lg">
          <h2 class="text-xl font-bold font-poppins mb-2">Payment</h2>
          <p class="text-sm text-gray-600 font-dm-sans mb-4">All transactions are secure and encrypted.</p>

          <div class="flex gap-4 mb-4">
            @foreach(['cash', 'gcash', 'mastercard', 'visa', 'paymaya', 'paypal'] as $tab)
              <button type="button" onclick="showPaymentTab(event, '{{ $tab }}')"
                class="tab-btn px-4 py-2 border border-pink-500 rounded-md font-semibold transition bg-white hover:bg-pink-500 hover:text-white">
                {{ ucfirst($tab) }}
              </button>
            @endforeach
          </div>

          <div id="cash" class="payment-content block">Cash on Delivery</div>

          <div id="gcash" class="payment-content hidden space-y-4">
            <input type="text" name="gcash_first_name" placeholder="First Name" class="w-full p-3 border rounded">
            <input type="text" name="gcash_last_name" placeholder="Last Name" class="w-full p-3 border rounded">
            <input type="text" name="gcash_phone" placeholder="Phone Number" class="w-full p-3 border rounded">
          </div>

          <div id="mastercard" class="payment-content hidden space-y-4">
            <input type="text" name="mastercard_card_number" placeholder="Card Number" class="w-full p-3 border rounded">
            <div class="grid grid-cols-2 gap-4">
              <input type="text" name="mastercard_exp_date" placeholder="MM/YY" class="p-3 border rounded">
              <input type="text" name="mastercard_security_code" placeholder="CVV" class="p-3 border rounded">
            </div>
            <input type="text" name="mastercard_name_on_card" placeholder="Name on Card" class="w-full p-3 border rounded">
          </div>

          <div id="visa" class="payment-content hidden space-y-4">
            <input type="text" name="visa_card_number" placeholder="Card Number" class="w-full p-3 border rounded">
            <div class="grid grid-cols-2 gap-4">
              <input type="text" name="visa_exp_date" placeholder="MM/YY" class="p-3 border rounded">
              <input type="text" name="visa_security_code" placeholder="CVV" class="p-3 border rounded">
            </div>
            <input type="text" name="visa_name_on_card" placeholder="Name on Card" class="w-full p-3 border rounded">
          </div>

          <div id="paymaya" class="payment-content hidden space-y-4">
            <input type="text" name="paymaya_first_name" placeholder="First Name" class="w-full p-3 border rounded">
            <input type="text" name="paymaya_last_name" placeholder="Last Name" class="w-full p-3 border rounded">
            <input type="text" name="paymaya_phone" placeholder="Phone Number" class="w-full p-3 border rounded">
          </div>

          <div id="paypal" class="payment-content hidden space-y-4">
            <input type="text" name="paypal_first_name" placeholder="First Name" class="w-full p-3 border rounded">
            <input type="text" name="paypal_last_name" placeholder="Last Name" class="w-full p-3 border rounded">
            <input type="text" name="paypal_phone" placeholder="Phone Number" class="w-full p-3 border rounded">
          </div>

          <a href="/checkout"
            class="block text-center w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded mt-4">Continue
            to Payment</a>
        </div>
      </div>

      <!-- ✅ RIGHT SIDE: ORDER SUMMARY -->
      <div class="lg:col-span-1 bg-gray-100 p-6 rounded-lg space-y-4">
        <h2 class="text-xl font-dm-sans text-left">Your order from <span class="font-bold font-poppins">Sabrosa</span></h2>
        <div class="space-y-4 font-dm-sans">
          @foreach ($cartItems as $item)
            @php $product = optional($item->productDetail->product); @endphp
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <div class="relative">
                  <img src="{{ asset($product->image_URL) }}" class="w-14 h-14 object-contain rounded border" />
                  <span class="absolute -top-1 -right-1 bg-pink-500 text-white text-xs font-bold w-5 h-5 rounded-full flex items-center justify-center">{{ $item->quantity }}</span>
                </div>
                <p class="text-sm w-[150px]">{{ $product->name }}</p>
              </div>
              <p class="text-sm font-semibold">₱{{ number_format($product->price * $item->quantity) }}</p>
            </div>
          @endforeach
        </div>
        <div class="border-t pt-4 space-y-2">
          <div class="flex justify-between"><span class="font-poppins">Subtotal</span><span>₱{{ number_format($subtotal) }}</span></div>
          <div class="flex justify-between"><span class="font-poppins">Shipping</span><span>₱{{ number_format($shippingFee) }}</span></div>
          <div class="flex justify-between text-lg font-bold border-t pt-4">
            <span class="font-poppins">Total</span><span class="font-poppins">₱{{ number_format($totalAmount) }}</span>
          </div>
          <p class="text-sm text-gray-500 text-right">Taxes included.</p>
        </div>
      </div>
    </div>
  </main>

  <script>
    function toggleEdit(fieldId) {
        let field = document.getElementById(fieldId);
        let button = document.getElementById("btn-" + fieldId);

        if (field.readOnly) {
            field.readOnly = false;
            field.style.backgroundColor = "#FFF8F8"; // ✅ Highlight when editable
            field.style.cursor = "text";
            button.style.backgroundColor = "#E55182"; 
            button.style.color = "blue"; // ✅ Active effect
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

    // ✅ Submit form only if there are changes
    document.getElementById("save-form").addEventListener("submit", function (event) {
        document.querySelectorAll("input").forEach(input => input.removeAttribute("readonly")); // ✅ Remove readonly from all inputs
        if (!this.dataset.edited) {
            event.preventDefault(); // ✅ Prevent submission if nothing was edited
            alert("No changes were made.");
        }
    });

    // ✅ JavaScript to Handle Tabs
    function showPaymentTab(event, tabId) {
        // ✅ Hide all payment content
        document.querySelectorAll('.payment-content').forEach(el => el.classList.add('hidden'));
        const activeTab = document.getElementById(tabId);
        if (activeTab) activeTab.classList.remove('hidden');

        // ✅ Reset all tabs to default (white background, black text)
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('bg-pink-500', 'text-pink-100');
            btn.classList.add('bg-white', 'text-black', 'border', 'border-pink-500');
        });

        // ✅ Set clicked tab as active (pink background, light pink text)
        event.currentTarget.classList.remove('bg-white', 'text-black');
        event.currentTarget.classList.add('bg-pink-500', 'text-pink-100');
    }
</script>

  @include('pages.footer')

</body>
</html>