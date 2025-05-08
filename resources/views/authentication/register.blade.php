<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg w-fit">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 w-[450px]">
        <div class="lg:col-span-2 space-y-6 order-2 lg:order-1">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-bold text-right font-poppins">Sign Up</h2>
                <img src="{{ asset('images/sabrosa_stable_logo.png') }}" alt="Header Image" class="w-auto h-12 sm:h-12 md:h-12 mb-4">
            </div>

            @if ($errors->any())
            <div class="text-red-500 text-center mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('register.submit') }}">
                @csrf

                <div class="w-full mb-5">
                    <label for="username" class="block mb-1 text-sm font-medium text-gray-700 mb-4 text-left font-dm-sans uppercase leading-2">Username </label>
                    <input ype="text" id="username" name="username" value="{{ old('username') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <div class="w-full mb-5">
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700 mb-4 text-left font-dm-sans uppercase leading-2"> Email </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <div class="w-full mb-5">
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700 mb-4 text-left font-dm-sans uppercase leading-2"> Password </label>
                    <input type="password" id="password" name="password" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <div class="w-full mb-5">
                    <label for="password_confirmation" class="block mb-1 text-sm font-medium text-gray-700 mb-4 text-left font-dm-sans uppercase leading-2"> Confirm Password </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-pink-400"/>
                </div>

                <button type="submit" class="mb-6 block text-center w-full bg-pink-500 hover:bg-pink-600 text-white font-semibold py-3 rounded transition duration-200">
                    Create Account
                </button>

            </form>

            <div class="w-full mb-0">
                <p class="mt-6 text-sm text-center text-gray-400">Already have an account? <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Login here</a></p>
            </div>

        </div>
    </div>
  </main>

  @include('pages.footer')

</body>
</html>