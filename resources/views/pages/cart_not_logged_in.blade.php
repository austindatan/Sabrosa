<!DOCTYPE html>
<html lang="en">
<head>
  @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <!-- Cart Not Logged In Message -->
  <div class="flex-1 flex flex-col justify-center items-center py-20">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Please Log In First</h1>
    <p class="text-lg text-gray-600 mb-6">To be able to use the Cart, please log in to your account.</p>
    <a href="{{ route('login') }}" class="text-pink-500 text-xl font-semibold hover:underline">Click here to log in</a>
  </div>

  @include('pages.footer')

</body>
</html>
