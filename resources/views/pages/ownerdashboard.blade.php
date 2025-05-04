<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

    @include('pages.header')

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-lg mx-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">Owner Dashboard</h2>

            <p class="text-white mb-4">Welcome to the Owner Dashboard</p>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">
                    Logout
                </button>
            </form>
        </div>
    </main>

    @include('pages.footer')

</body>
</html>
