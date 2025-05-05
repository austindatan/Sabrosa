document.addEventListener('DOMContentLoaded', function () {
    const lineCtx = document.getElementById('lineChart').getContext('2d');
    new Chart(lineCtx, {
      type: 'line',
      data: {
        labels: ['Oct 2021', 'Nov 2021', 'Dec 2021', 'Jan 2022', 'Feb 2022', 'Mar 2022'],
        datasets: [
          {
            label: 'Achieved',
            data: [5, 6, 4, 8, 5, 6],
            borderColor: '#ff6384',
            tension: 0.4,
          },
          {
            label: 'Target',
            data: [3, 4, 4, 5, 6, 5],
            borderColor: '#36a2eb',
            tension: 0.4,
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    });
  
    const pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
      type: 'doughnut',
      data: {
        labels: ['Email', 'Referral', 'Paid Search', '(Other)', 'Direct', 'Social', 'Display', 'Organic Search'],
        datasets: [{
          label: 'Sessions',
          data: [40, 40, 37, 35, 32, 28, 27, 10],
          backgroundColor: [
            '#4b49ac', '#3d94f6', '#f67280', '#c06c84',
            '#f8b195', '#6c5b7b', '#355c7d', '#99b898'
          ]
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        cutout: '70%'
      }
    });
  });
  document.addEventListener('DOMContentLoaded', function () {
    // (Charts code here...)
  
    // Collapsible sidebar logic
    const collapsibles = document.querySelectorAll('.collapsible');
    collapsibles.forEach(button => {
      button.addEventListener('click', () => {
        const submenu = button.nextElementSibling;
        submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
      });
    });
  });
  