<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  
  <main class="px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[79px] sm:mt-[200px] mb-[0px] sm:mb-[150px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg w-fit">

    <div class="flex-1 flex flex-col justify-center items-center py-20 px-6 text-center">
      <img src="{{ asset('images/sabrosa_stable_logo.png') }}" alt="Header Image" class="w-auto h-20 sm:h-24 md:h-28 mb-4">

      <h1 class="text-base sm:text-xl md:text-2xl lg:text-3xl font-bold text-gray-800 mb-4">
        It's so silent around here...
      </h1>

      <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-6">
        Log in to find your registered cart.
      </p>

      <a href="{{ route('login') }}" class="inline-block bg-pink-500 hover:bg-pink-600 text-white font-semibold text-sm sm:text-base md:text-lg px-6 py-2 rounded transition duration-200">
        Click here to log in
      </a>
    </div>


  </main>

  @include('pages.footer')

</body>
</html>
