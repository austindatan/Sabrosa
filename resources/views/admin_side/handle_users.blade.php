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

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      <h1 class="text-2xl font-bold text-[#E55182] mb-4">Users List</h1>


          <table class="w-full table-fixed text-sm text-left text-pink-900">
            <thead class="text-xs uppercase bg-pink-100 text-pink-700">
              <tr>
                <th class="w-64 px-4 py-3 truncate">Name</th>
                <th class="w-24 px-4 py-3 truncate">Address</th>
                <th class="w-24 px-4 py-3 truncate">Email</th>
                <th class="w-24 px-4 py-3 truncate">Phone Number</th>
                <th class="w-24 px-4 py-3 truncate">Company</th>
                <th class="w-10 px-4 py-3 truncate"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
              </th>
              </tr>
            </thead>
            <tbody>
              @foreach($handleusers as $handleuser)
              <tr class="bg-white border-b border-pink-200 hover:bg-pink-50">
                <td class="px-4 py-4 truncate text-pink-900 flex items-center gap-2">{{ $handleuser->firstname ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $handleuser->city ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $handleuser->email ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $handleuser->phone ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">{{ $handleuser->company ?? 'N/A' }}</td>
                <td class="px-4 py-4 truncate">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </main>

  </div>
</body>

</html>
