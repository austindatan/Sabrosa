<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg w-fit">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
      

      <!-- ✅ LEFT SIDE: FORM -->
      <div class="lg:col-span-2 space-y-10">
        <!-- ✅ Delivery Form -->
        <form action="{{ route('delivery.update', $customer->customer_ID) }}" method="POST" class="space-y-6">
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
                  class="absolute right-2 top-1 text-pink-500 text-lg transition duration-200 ease-in-out 
                hover:bg-pink-200 hover:rounded-lg hover:px-1 hover:text-pink-700 
                active:bg-pink-500 active:text-white cursor-pointer">✏️</button>
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

        <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-center">Select Your Payment Method</h2>

        <div class="flex flex-wrap gap-2 justify-center mb-4">
            @php $methods = ['Cash', 'GCash', 'Mastercard', 'Visa', 'Paymaya', 'Paypal']; @endphp
            @foreach($methods as $index => $method)
                <button type="button"
                    onclick="showTab({{ $index }})"
                    class="payment-btn px-3 py-2 rounded text-white text-sm font-semibold
                        {{ $index === 0 ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-pink-500 hover:bg-pink-600' }}">
                    {{ $method }}
                </button>
            @endforeach
        </div>

        <form method="POST" action="{{ route('delivery.payment.update') }}">
            @csrf
            <input type="hidden" name="payment_method_ID" id="payment_method_ID" value="1">

            <!-- Tabs -->
            <div id="tabs">
                <!-- Cash -->
                <div class="tab" style="display:block">
                    <p class="text-lg text-center font-semibold text-black border border-pink-300 p-3 rounded">
                        You selected <span class="font-bold">Cash on Delivery</span>. Kindly prepare the exact amount for the rider upon arrival. Thank you for your order!
                    </p>
                </div>

                <!-- GCash -->
                <div class="tab hidden">
                    <input type="text" name="first_name" placeholder="First Name" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="last_name" placeholder="Last Name" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="phone" placeholder="Phone Number" class="w-full p-2 border rounded mb-2">
                </div>

                <!-- Mastercard -->
                <div class="tab hidden">
                    <input type="text" name="card_number" placeholder="Card Number" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="expiry" placeholder="MM/YY" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="cvv" placeholder="CVV" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="card_name" placeholder="Name on Card" class="w-full p-2 border rounded mb-2">
                </div>

                <!-- Visa -->
                <div class="tab hidden">
                    <input type="text" name="card_number" placeholder="Card Number" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="expiry" placeholder="MM/YY" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="cvv" placeholder="CVV" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="card_name" placeholder="Name on Card" class="w-full p-2 border rounded mb-2">
                </div>

                <!-- Paymaya -->
                <div class="tab hidden">
                    <input type="text" name="first_name" placeholder="First Name" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="last_name" placeholder="Last Name" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="phone" placeholder="Phone Number" class="w-full p-2 border rounded mb-2">
                </div>

                <!-- Paypal -->
                <div class="tab hidden">
                    <input type="text" name="first_name" placeholder="First Name" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="last_name" placeholder="Last Name" class="w-full p-2 border rounded mb-2">
                    <input type="text" name="phone" placeholder="Phone Number" class="w-full p-2 border rounded mb-2">
                    <input type="email" name="email" placeholder="Email" class="w-full p-2 border rounded mb-2">
                </div>
            </div>

            <button type="submit" class="w-full mt-4 bg-pink-500 text-white font-semibold py-2 rounded hover:bg-pink-600">Proceed to Checkout</button>
        </form>
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

    function showTab(index) {
            // Show selected tab and hide others
            let tabs = document.querySelectorAll('.tab');
            tabs.forEach((tab, i) => {
                tab.classList.toggle('hidden', i !== index);
                tab.style.display = (i === index) ? 'block' : 'none';
            });

            // Update hidden input
            document.getElementById('payment_method_ID').value = index + 1;

            // Update button styles
            let buttons = document.querySelectorAll('.payment-btn');
            buttons.forEach((btn, i) => {
                if (i === index) {
                    btn.classList.remove('bg-pink-500', 'hover:bg-pink-600');
                    btn.classList.add('bg-yellow-500', 'hover:bg-yellow-600');
                } else {
                    btn.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');
                    btn.classList.add('bg-pink-500', 'hover:bg-pink-600');
                }
            });
        }
</script>

  @include('pages.footer')

</body>
</html>