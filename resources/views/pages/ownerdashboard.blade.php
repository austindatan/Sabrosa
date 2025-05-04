<!DOCTYPE html>
<html lang="en">
<head>
    @include('pages.head')
</head>
<body class="bg-pink-100 bg-cover bg-center overflow-x-hidden min-h-screen flex flex-col">

    @include('pages.header')

    <main class="flex-grow flex items-center justify-center mt-24 mb-10">
        <div class="bg-gray-800 p-8 rounded-2xl shadow-lg w-full max-w-4xl mx-4">
            <h2 class="text-2xl font-bold mb-6 text-center text-white">Owner Dashboard</h2>

            <p class="text-white mb-4 text-center">Manage User Roles</p>

            <!-- Display all users -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse bg-gray-700 text-white rounded-lg shadow-md">
                    <thead>
                        <tr class="bg-gray-900">
                            <th class="p-3">Username</th>
                            <th class="p-3">Email</th>
                            <th class="p-3">Role</th>
                            <th class="p-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="border-t border-gray-600">
                            <td class="p-3">{{ $user->username }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">
                                <form method="POST" action="{{ route('update.role', $user->user_account_ID) }}" class="flex">
                                    @csrf
                                    @method('PUT')
                                    <select name="role" class="px-3 py-1 bg-gray-800 border border-gray-600 rounded-lg text-white">
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                        <option value="employee" {{ $user->role == 'employee' ? 'selected' : '' }}>Employee</option>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                                    </select>
                                    <button type="submit" class="ml-2 px-3 py-1 bg-blue-500 hover:bg-blue-400 text-white rounded-lg font-semibold">
                                        Update
                                    </button>
                                </form>
                            </td>
                            <td class="p-3 text-center">
                                <form method="POST" action="{{ route('delete.user', $user->user_account_ID) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            @if (session('success'))
                <div class="mt-6 text-center">
                    <p class="text-green-400 font-semibold bg-green-900 bg-opacity-50 px-4 py-2 rounded-lg inline-block">
                        {{ session('success') }}
                    </p>
                </div>
            @endif

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" class="mt-6 text-center">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">
                    Logout
                </button>
            </form>
        </div>
    </main>

    @include('pages.footer')

</body>
</html>
