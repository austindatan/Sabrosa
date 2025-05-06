<!DOCTYPE html>
<html lang="en">
  <head>
    @vite(['resources/css/admin_style.css', 'resources/js/dashboard_script.js']) 
    <title>Sabrosa Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @include('pages.head')
  </head>
  <body class="bg-pink-50">

  <div class="app min-h-screen flex flex-col md:flex-row">

  @include('admin_side.sidebar')

    <main class="flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
      <h2 class="font-poppins font-bold text-3xl text-left">SABROSA Dashboard</h2>
        <div class="charts">
          <div class="chart-box">
            <canvas id="lineChart"></canvas>
          </div>
          <div class="chart-box">
            <canvas id="pieChart"></canvas>
          </div>
        </div>
        <div class="metrics">
          <div class="metric">Engaged Sessions<br /><strong>1,158</strong></div>
          <div class="metric">Engagement Rate<br /><strong>24.31%</strong></div>
          <div class="metric">Sessions<br /><strong>755</strong></div>
          <div class="metric">Sessions per User<br /><strong>35.55</strong></div>
          <div class="metric">Active Users<br /><strong>982</strong></div>
          <div class="metric">New User<br /><strong>841</strong></div>
          <div class="metric">Total Users<br /><strong>469</strong></div>
          <div class="metric">Views<br /><strong>681</strong></div>
          <div class="metric">User Engagement<br /><strong>21m 41s</strong></div>
          <div class="metric">Conversions<br /><strong>931</strong></div>
        </div>
        <div>
        <form method="POST" action="{{ route('logout') }}" class="mt-6 text-center">
                @csrf
                <button type="submit" class="px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">
                    Logout
                </button>
            </form>
</div>
    </main>

  </div>
</body>

</html>
