<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-1 px-4 py-6 sm:p-8 max-w-6xl mx-auto mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 w-[450px]">
        <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-right font-poppins">Login</h2>
                <img src="{{ asset('images/sabrosa_stable_logo.png') }}" alt="Header Image" class="w-auto h-12 sm:h-12 md:h-12 mb-4">
            </div>

            @if($errors->has('login'))
                <div class="text-red-500 text-center mb-4">
                    {{ $errors->first('login') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <div class="w-full mb-4">
                    <label for="login" class="block mb-1 text-sm font-medium text-gray-700 mb-4 text-left font-dm-sans uppercase leading-2"> Email </label>
                    <input type="text" id="login" name="login" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <div class="w-full mb-4">
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700 mb-4 text-left font-dm-sans uppercase leading-2"> Password </label>
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <div class="w-full mb-4">
                    <a href="{{ route('login') }}" class="text-sm font-base text-left font-poppins underline">Forgot your password?</a href>
                </div>

                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('register') }}" class="inline-block bg-white hover:bg-pink-600 border-2 border-[#E55182] text-pink-600 font-semibold text-sm sm:text-base md:text-lg px-6 py-2 rounded transition duration-200">
                        Sign Up
                    </a>
                    <button type="submit" class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold text-sm sm:text-base md:text-lg px-6 py-2 rounded transition duration-200">
                        Login
                    </button>
                </div>
            </form>

        </div>
    </div>
  </main>

  @include('pages.footer')

</body>
</html>
