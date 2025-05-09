<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Customer</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <form action="{{ route('delivery.update', $customer->customer_ID) }}" method="POST" class="bg-white p-6 rounded shadow-md w-96 space-y-4">
        @csrf
        <h2 class="text-xl font-semibold mb-4">Edit Customer</h2>

        <div>
            <label class="block text-sm font-medium text-gray-700">Firstname</label>
            <div class="relative">
                <input type="text" name="firstname" value="{{ old('firstname', $customer->firstname) }}" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                <span class="absolute right-3 top-2 cursor-pointer">✏️</span>
            </div>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Lastname</label>
            <div class="relative">
                <input type="text" name="lastname" value="{{ old('lastname', $customer->lastname) }}" class="w-full border px-3 py-2 rounded focus:outline-none focus:ring-2 focus:ring-blue-400" />
                <span class="absolute right-3 top-2 cursor-pointer">✏️</span>
            </div>
        </div>

        @if(session('success'))
            <div class="text-green-600 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">
            Save Changes
        </button>
    </form>

</body>
</html>