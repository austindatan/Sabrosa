<!DOCTYPE html>
<html lang="en">
  <head>
    @vite(['resources/js/dashboard_script.js']) 
    <title>Sabrosa Dashboard | Employee List</title>
    @include('pages.head')
  </head>
  <body class="bg-pink-50">

  <div class="app min-h-screen flex flex-col md:flex-row">

  @include('admin_side.sidebar')

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      <h1 class="text-2xl font-bold text-[#E55182] mb-4">Employee List</h1>
        <div class="relative overflow-x-auto sm:rounded-lg"><div class="pb-4 bg-white">


          <table class="w-full table-fixed text-sm text-left text-pink-900">
            <thead class="text-xs uppercase bg-pink-100 text-pink-700">
              <tr>
                <th class="w-85 px-4 py-3 truncate">Name</th>
                <th class="w-55 px-4 py-3 truncate">Address</th>
                <th class="w-52 px-4 py-3 truncate">Job Position</th>
                <th class="w-60 px-4 py-3 truncate">Job Description</th>
                <th class="w-19 px-4 py-3 truncate"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg>
              </th>
              </tr>
            </thead>

            <tbody>
              <tr class="bg-white border-b border-pink-200 hover:bg-pink-50">
                <td class="px-4 py-4 truncate text-pink-900 flex items-center gap-2">Austin Dilan Datan</td>
                <td class="px-4 py-4 truncate">austindatan@gmail.com</td>
                <td class="px-4 py-4 truncate">09262103722</td>
                <td class="px-4 py-4 truncate">System Analyst</td>
                <td class="px-4 py-4 truncate">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" /></svg></a>
                </td>
              </tr>

              @foreach($employees as $employee)
                <tr class="bg-white border-b border-pink-200 hover:bg-pink-50">
                      <td class="px-4 py-4 truncate">
                    {{ optional($employee->employee) ? $employee->employee->firstname . ' ' . $employee->employee->middlename . ' ' . $employee->employee->lastname: 'N/A' }}
                      <td class="px-4 py-4 truncate">
                    {{ optional($employee->employee) ? $employee->employee->street . ' ' . $employee->employee->city . ' ' . $employee->employee->province: 'N/A' }}
                    <td class="px-4 py-4 truncate">{{ $employee->employee_positions->position_title ?? 'N/A' }}</td>
                    <td class="px-4 py-4 truncate">{{ $employee->employee_positions->job_description ?? 'N/A' }}</td>
                  <td class="px-4 py-4 truncate">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
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
