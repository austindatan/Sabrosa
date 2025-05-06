<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sabrosa | Delivery</title>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">
  @include('pages.header')

  <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

      {{-- ✅ LEFT SIDE: Delivery (Preserved) --}}
      <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-bold text-right font-poppins">Delivery</h2>
          <p class="text-sm text-gray-600 font-dm-sans">{{ $customer->email }}</p>
        </div>

        <p class="text-base text-gray-600 font-dm-sans mx-auto">Express Checkout</p>

        <div class="grid grid-cols-3 gap-4 w-full font-dm-sans">
          <div class="flex justify-center items-center w-full">
            <img src="{{ asset('images/maya-3.png') }}" class="bg-[#00b464] w-full h-18 object-contain rounded" />
          </div>
          <div class="flex justify-center items-center w-full">
            <img src="{{ asset('images/gcash-2.png') }}" class="bg-blue-300 w-full h-18 object-contain rounded" />
          </div>
          <div class="flex justify-center items-center w-full">
            <img src="{{ asset('images/paypal.png') }}" class="bg-yellow-400 w-full h-18 object-contain rounded" />
          </div>
        </div>

        <div class="flex items-center justify-center gap-4 my-6">
          <div class="flex-grow border-t border-gray-300"></div>
          <p class="text-base text-gray-600 font-dm-sans">OR</p>
          <div class="flex-grow border-t border-gray-300"></div>
        </div>

        {{-- ✅ Editable Delivery Form --}}
        <form method="POST" action="{{ route('delivery.update') }}">
          @csrf

          <!-- ✅ Success Message -->
          @if(session('success'))
            <div id="success-message" style="background-color: #22c55e; color: white; padding: 10px; border-radius: 8px; text-align: center; font-weight: bold; margin-bottom: 16px; opacity: 1; transition: opacity 0.5s;">
              {{ session('success') }}
            </div>
            <script>
              setTimeout(() => { document.getElementById("success-message").style.opacity = "0"; }, 3000);
            </script>
          @endif

          <!-- ✅ First & Last Name Side by Side -->
          <div class="grid grid-cols-2 gap-4">
            @foreach(['first_name', 'last_name'] as $field)
              <div class="relative w-full">
                <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ $customer->$field }}" 
                  class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" 
                  readonly style="background-color: white; cursor: not-allowed;" />
                <label for="{{ $field }}" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                  {{ ucwords(str_replace('_', ' ', $field)) }}
                </label>
                <button type="button" onclick="toggleEdit('{{ $field }}')" id="btn-{{ $field }}" 
                  style="position: absolute; right: 12px; top: 6px; color: #E55182; background-color: transparent; border: none; font-size: 18px; cursor: pointer; transition: 0.3s;">
                  ✏️
                </button>
              </div>
            @endforeach
          </div>

          <!-- ✅ Other Fields: Full Width, Stacked -->
          @foreach(['email', 'province', 'city', 'barangay', 'street', 'company', 'phone'] as $field)
            <div class="relative w-full">
              <input type="text" id="{{ $field }}" name="{{ $field }}" value="{{ $customer->$field }}" 
                class="peer w-full border border-gray-300 rounded px-3 pt-5 pb-2 focus:outline-none focus:ring-2 focus:ring-pink-400" 
                readonly style="background-color: white; cursor: not-allowed;" />
              <label for="{{ $field }}" class="absolute left-3 top-2 text-gray-500 text-sm transition-all peer-focus:top-2 peer-focus:text-sm peer-focus:text-pink-500">
                {{ ucwords(str_replace('_', ' ', $field)) }}
              </label>
              <button type="button" onclick="toggleEdit('{{ $field }}')" id="btn-{{ $field }}" 
                style="position: absolute; right: 12px; top: 6px; color: #E55182; background-color: transparent; border: none; font-size: 18px; cursor: pointer; transition: 0.3s;">
                ✏️
              </button>
            </div>
          @endforeach

          <!-- ✅ Submit Button -->
          <div class="mt-6 text-center">
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-6 py-3 rounded-md text-lg font-semibold">
              Save Changes
            </button>
          </div>
        </form>
      </div>

      {{-- ✅ Order Summary --}}
      <div class="hidden lg:block lg:col-span-1 bg-gray-100 p-6 rounded-lg space-y-4 order-1 lg:order-2">
        <h2 class="text-xl font-dm-sans text-left">Your order from <span class="font-bold font-poppins">Sabrosa</span></h2>

        <div class="space-y-4 font-dm-sans">
          @foreach ($cartItems as $item)
            @php $product = optional($item->productDetail->product); @endphp
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3 relative">
                <div class="relative">
                  <img src="{{ asset($product->image_URL) }}" class="bg-white w-14 h-14 object-contain rounded border" />
                  <span style="position: absolute; top: -4px; right: -4px; background-color: #E55182; color: white; font-size: 12px; font-weight: bold; width: 20px; height: 20px; border-radius: 50%; display: flex; justify-content: center; align-items: center;">
                    {{ $item->quantity }}
                  </span>
                </div>
                <p class="text-sm text-left w-[150px]">{{ $product->name }}</p>
              </div>
              <p class="text-sm font-semibold">₱{{ number_format($product->price * $item->quantity) }}</p>
            </div>
          @endforeach
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
            field.style.backgroundColor = "#FFF8F8"; 
            field.style.cursor = "text"; 
            button.style.backgroundColor = "#E55182"; 
            button.style.color = "white"; 
        } else {
            field.readOnly = true;
            field.style.backgroundColor = "white"; 
            field.style.cursor = "not-allowed"; 
            button.style.backgroundColor = "transparent";
            button.style.color = "#E55182"; 
            document.querySelector("form").submit(); 
        }
        field.focus();
    }
  </script>

  @include('pages.footer')

</body>
</html>