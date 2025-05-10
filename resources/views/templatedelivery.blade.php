<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-6">

    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-center">Select Your Payment Method</h2>

        <div class="flex flex-wrap gap-2 justify-center mb-4">
            @php $methods = ['Cash', 'GCash', 'Mastercard', 'Visa', 'Paymaya', 'Paypal']; @endphp
            @foreach($methods as $index => $method)
                <button type="button"
                    onclick="showTab({{ $index }})"
                    class="payment-btn px-3 py-2 rounded text-white text-sm
                        {{ $index === 0 ? 'bg-yellow-500 hover:bg-yellow-600' : 'bg-blue-500 hover:bg-blue-600' }}">
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
                    <p class="text-lg text-center font-semibold text-green-600 border border-green-300 p-3 rounded">
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

            <button type="submit" class="w-full mt-4 bg-green-500 text-white py-2 rounded hover:bg-green-600">Proceed to Checkout</button>
        </form>
    </div>

    <script>
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
                    btn.classList.remove('bg-blue-500', 'hover:bg-blue-600');
                    btn.classList.add('bg-yellow-500', 'hover:bg-yellow-600');
                } else {
                    btn.classList.remove('bg-yellow-500', 'hover:bg-yellow-600');
                    btn.classList.add('bg-blue-500', 'hover:bg-blue-600');
                }
            });
        }
    </script>
</body>
</html>
