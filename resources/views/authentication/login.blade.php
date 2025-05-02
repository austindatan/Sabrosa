<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

    @include('pages.header')

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-sm mx-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">Welcome Back</h2>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label for="username" class="block text-sm mb-1 text-white">Username</label>
                    <input type="text" id="username" name="username" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-sm mb-1 text-white">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-4 py-2 bg-gray-700 border border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-white">
                </div>

                <button type="submit"
                    class="w-full py-2 bg-indigo-600 hover:bg-indigo-500 rounded-lg font-semibold transition">
                    Login
                </button>
            </form>

            <p class="mt-6 text-sm text-center text-gray-400">
                Dont have an account?
                <a href="{{ route('register') }}" class="text-indigo-400 hover:underline">Create one</a>
            </p>
        </div>
    </main>

    @include('pages.footer')

</body>
</html>
