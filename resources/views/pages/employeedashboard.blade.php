<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center text-center overflow-x-hidden min-h-screen flex flex-col">

    @include('pages.header')

    <main class="flex-grow flex items-center justify-center">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-lg mx-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">Employee Dashboard</h2>

            <p class="text-white">Welcome to the Employee Dashboard</p>
            <!-- Add your admin dashboard content here -->
        </div>
    </main>

    @include('pages.footer')

</body>
</html>
