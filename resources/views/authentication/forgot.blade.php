<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg w-fit">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 w-[450px]">
        <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-right font-poppins">Reset Password</h2>
                <img src="{{ asset('images/sabrosa_stable_logo.png') }}" alt="Header Image" class="w-auto h-12 sm:h-12 md:h-12 mb-4">
            </div>

            @if($errors->any())
                <div class="text-red-500 text-center mb-4">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- ✅ Success Message -->
            @if(session('success'))
                <div id="success-message" class="bg-green-500 text-white px-4 py-2 rounded-md mb-4 text-center font-semibold transition-opacity duration-500">
                    {{ session('success') }}
                </div>

                <script>
                  setTimeout(() => {
                    document.getElementById("success-message").style.opacity = "0";
                  }, 3000);
                </script>
            @endif

            <form method="POST" action="{{ route('forgot.submit') }}">
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

                <!-- ✅ Action Buttons -->
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('login') }}" class="inline-block bg-white hover:bg-pink-600 border-2 border-[#E55182] text-pink-600 font-semibold text-sm sm:text-base md:text-lg px-6 py-2 rounded transition duration-200">
                        Back to Login
                    </a>
                    <button type="submit" class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold text-sm sm:text-base md:text-lg px-6 py-2 rounded transition duration-200">
                        Reset Password
                    </button>
                </div>
            </form>

        </div>
    </div>
  </main>

  @include('pages.footer')

</body>
</html>