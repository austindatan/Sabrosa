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
  
  for (let i = 1; i <= 3; i++) {
    const input = document.getElementById(`productPhoto${i}`);
    const preview = document.getElementById(`productPhotoPreview${i}`);

    if (input && preview) {
        input.addEventListener('change', () => {
            const file = input.files[0];
            if (file) {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    alert('File selected in slot ${i} is not an image. Please select an image file.');
                    input.value = ''; 
                    preview.src = 'placeholder.jpg'; 
                }
            } else {
                preview.src = 'placeholder.jpg';
            }
        });
    }
}

document.getElementById('addProductForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);

    try {
        const response = await fetch('/your-server-endpoint', {
            method: 'POST',
            body: formData
        });

        if (!response.ok) throw new Error('Server error');

        const result = await response.json();
        alert('Product added successfully!');
        form.reset();


        for (let i = 1; i <= 3; i++) {
            const preview = document.getElementById(`productPhotoPreview${i}`);
            if (preview) preview.src = 'placeholder.jpg';
        }
    } catch (err) {
        console.error('Submission error:', err);
        alert('Failed to add product. Please try again.');
    }
});