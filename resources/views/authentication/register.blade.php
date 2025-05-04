<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

  @include('pages.header')

  <main class="flex-grow flex items-center justify-center mt-35 mb-25"> <!-- Adjusted spacing -->
    <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-sm mx-4">
        <h2 class="text-2xl font-bold mb-6 text-center text-white">Create an Account</h2>

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

            <div class="mb-4">
                <label for="username" class="block text-sm mb-1 text-white">Username</label>
                <input type="text" id="username" name="username" value="{{ old('username') }}" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm mb-1 text-white">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm mb-1 text-white">Password</label>
                <input type="password" id="password" name="password" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm mb-1 text-white">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required
                    class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
            </div>

            <button type="submit"
                class="w-full py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg font-semibold transition">
                Create Account
            </button>
        </form>

        <p class="mt-6 text-sm text-center text-gray-400">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Login here</a>
        </p>
    </div>
  </main>

  @include('pages.footer')

</body>
</html>