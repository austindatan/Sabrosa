<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

    @include('pages.header')

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-lg mx-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">User Dashboard</h2>
            
            <p class="text-white">Welcome to the User Dashboard</p>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 text-white rounded-lg font-semibold transition">
                    Logout
                </button>
            </form>
        </div>
    </main>

    @include('pages.footer')

</body>
</html>