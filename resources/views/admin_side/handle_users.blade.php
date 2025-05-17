<!DOCTYPE html>
<html lang="en">
  <head>
    @vite(['resources/js/dashboard_script.js'])
    <title>Sabrosa Dashboard | Users</title>
    @include('pages.head')
  </head>
  <body class="bg-pink-50">
    <div class="app min-h-screen flex flex-col md:flex-row">
      @include('admin_side.sidebar')

      <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-5 mb-5 bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)] md:mr-4">
        <h1 class="text-2xl font-bold text-[#E55182] mb-4">Users List</h1>

        <table class="w-full table-fixed text-sm text-left text-pink-900">
          <thead class="text-xs uppercase bg-pink-100 text-pink-700">
            <tr>
              <th class="w-1/4 px-4 py-3 truncate">Name</th>
              <th class="w-1/3 px-4 py-3 whitespace-normal break-words">Address</th>
              <th class="w-1/4 px-4 py-3 truncate">Email</th>
              <th class="w-1/6 px-4 py-3 truncate">Phone Number</th>
              <th class="w-1/6 px-4 py-3 truncate">Company</th>
            </tr>
          </thead>
          <tbody>
            @foreach($handleusers as $user)
              <tr class="bg-white border-b border-pink-200 hover:bg-pink-50 align-top">
                <td class="px-4 py-4">
                  {{ trim(($user->firstname ?? '') . ' ' . ($user->lastname ?? '')) }}
                </td>
                <td class="px-4 py-4 whitespace-normal break-words">
                  {{
                    trim(
                      implode(', ', array_filter([
                        $user->street ?? '',
                        $user->barangay ?? '',
                        $user->city ?? '',
                        $user->province ?? '',
                        $user->country ?? ''
                      ]))
                    )
                  }}
                </td>
                <td class="px-4 py-4 truncate">{{ $user->email ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $user->phone ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $user->company ?? 'N/A' }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </main>
    </div>
  </body>
</html>
