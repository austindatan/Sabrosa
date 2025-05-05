<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    @vite(['resources/css/admin_style.css', 'resources/js/dashboard_script.js']) 
    <title>Web Analytics Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>
  <body>
  @include('pages.adminheader')
    <div class="app"> 
      <aside class="sidebar w-[80px] bg-white pd-[20px]"></aside>

      <main class="dashboard">
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
      </main>
    </div>

  </body>
</html>
