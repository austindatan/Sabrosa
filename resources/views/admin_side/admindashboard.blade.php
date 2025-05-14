<!DOCTYPE html>
<html lang="en">
<head>
  @vite(['resources/css/admin_style.css', 'resources/js/dashboard_script.js']) 
  <title>Sabrosa Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  @include('pages.head')
  <style>
  .charts {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem;
    margin-top: 1.5rem;
  }

  .chart-box {
    flex: 1 1 45%;
    min-width: 300px;
    max-width: 600px;
    padding: 1rem;
    background-color: #fff;
    border-radius: 10px;
    border: 1px solid #e5e7eb;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }

  .chart-box canvas {
    width: 100% !important;
    height: 300px !important;
  }

  @media (max-width: 768px) {
    .chart-box {
      flex: 1 1 100%;
    }
  }
</style>
</head>
<body class="bg-pink-50">

<div class="app min-h-screen flex flex-col md:flex-row">
  @include('admin_side.sidebar')

  <main class="font-dm-sans flex-1 px-4 py-6 sm:p-8 text-left max-w-6xl mx-auto text-base sm:text-lg mt-[20px] mb-[20px] bg-white border-2 border-[#E55182] rounded-lg shadow-lg md:ml-[calc(21%+1rem)]">
    <h2 class="font-poppins font-bold text-3xl text-left">SABROSA Dashboard</h2>
    
    <div class="charts">
      <div class="chart-box">
        <h3 class="text-xl font-semibold mb-2 text-center">Top Ordered Products</h3>
        <canvas id="lineChart"></canvas>
      </div>
      <div class="chart-box">
        <h3 class="text-xl font-semibold mb-2 text-center">Top Ordered Products</h3>
        <canvas id="pieChart"></canvas>
      </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 mt-10">
    <div class="bg-pink-100 border border-pink-300 p-4 rounded-lg text-center">
      <div class="text-sm text-pink-800 font-medium">Total Transactions</div>
      <div class="text-2xl font-bold text-pink-700">{{ number_format($totalTransactions) }}</div>
    </div>
    <div class="bg-pink-100 border border-pink-300 p-4 rounded-lg text-center">
      <div class="text-sm text-pink-800 font-medium">Completed Transactions</div>
      <div class="text-2xl font-bold text-pink-700">{{ number_format($completedTransactions) }}</div>
    </div>
    <div class="bg-pink-100 border border-pink-300 p-4 rounded-lg text-center">
      <div class="text-sm text-pink-800 font-medium">Pending Transactions</div>
      <div class="text-2xl font-bold text-pink-700">{{ number_format($pendingTransactions) }}</div>
    </div>
    <div class="bg-pink-100 border border-pink-300 p-4 rounded-lg text-center">
      <div class="text-sm text-pink-800 font-medium">Total Revenue</div>
      <div class="text-2xl font-bold text-pink-700">₱{{ number_format($totalRevenue, 2) }}</div>
    </div>
  </div>

    <div class="mt-6 flex justify-end">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="font-dm-sans px-4 py-2 bg-red-600 hover:bg-red-500 rounded-lg text-white font-semibold transition">
          Logout
        </button>
      </form>
    </div>
  </main>
</div>

<script>
  // Top Ordered Products per Month (Line Chart)
  const months = {!! json_encode($topOrderedProducts->pluck('month')->map(fn($m) => date('F', mktime(0, 0, 0, $m, 1)))) !!};
  const transactionCounts = {!! json_encode($topOrderedProducts->pluck('total')) !!};

  new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
      labels: months,
      datasets: [{
        label: 'Top Ordered Products',
        data: transactionCounts,
        borderColor: 'rgba(229, 81, 130, 1)',
        backgroundColor: 'rgba(229, 81, 130, 0.2)',
        tension: 0.4,
        fill: true
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          min: 0,
          max: 50,
          ticks: {
            stepSize: 10
          }
        }
      }
    }
  });

  // Sales by Category (Pie Chart with Percentages)
  const productLabels = {!! json_encode($categorySales->pluck('category_name')) !!};
  const productQuantities = {!! json_encode($categorySales->pluck('total_quantity')) !!}.map(q => Number(q));

  const totalQuantity = productQuantities.reduce((a, b) => a + b, 0);

  new Chart(document.getElementById('pieChart'), {
    type: 'pie',
    data: {
      labels: productLabels,
      datasets: [{
        label: 'Top Categories',
        data: productQuantities,
        backgroundColor: [
          'rgba(255, 99, 132, 0.6)',
          'rgba(54, 162, 235, 0.6)',
          'rgba(255, 206, 86, 0.6)',
          'rgba(75, 192, 192, 0.6)',
          'rgba(153, 102, 255, 0.6)'
        ],
        borderColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        tooltip: {
          callbacks: {
            label: function(context) {
              const label = context.label || '';
              const value = context.raw || 0;
              const percentage = ((value / totalQuantity) * 100).toFixed(1);
              return `${label}: ${value} (${percentage}%)`;
            }
          }
        },
        legend: {
          labels: {
            generateLabels: function(chart) {
              const data = chart.data;
              if (data.labels.length && data.datasets.length) {
                const dataset = data.datasets[0];
                return data.labels.map(function(label, i) {
                  const value = dataset.data[i];
                  const percentage = ((value / totalQuantity) * 100).toFixed(1);
                  return {
                    text: `${label} (${percentage}%)`,
                    fillStyle: dataset.backgroundColor[i],
                    strokeStyle: dataset.borderColor[i],
                    lineWidth: 1,
                    index: i
                  };
                });
              }
              return [];
            },
            font: {
              size: 14
            },
            padding: 20
          }
        },
        datalabels: {
          color: 'black',
          font: {
            weight: 'bold',
            size: 10
          },
          formatter: function (value, context) {
              const data = context.chart.data.datasets[0].data;
              const total = data.reduce((sum, val) => sum + val, 0);
              const percentage = ((value / total) * 100).toFixed(1);
              const label = context.chart.data.labels[context.dataIndex];
              return `${label}: ${percentage}%`;
          }
        }
      }
    },
    plugins: [ChartDataLabels]
  });
</script>




</body>
</html>
