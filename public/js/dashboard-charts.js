document.addEventListener('DOMContentLoaded', function() {
    // Chart: Pemakaian Ruangan
    const ctxRoom = document.getElementById('roomUsageChart');
    if (ctxRoom) {
      new Chart(ctxRoom, {
        type: 'bar',
        data: {
          labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
          datasets: [{
            label: 'Ruang Digunakan',
            data: [3, 4, 2, 5, 4],
            backgroundColor: '#3b82f6'
          }]
        },
        options: {
          scales: {
            y: { beginAtZero: true, ticks: { color: 'white' } },
            x: { ticks: { color: 'white' } }
          },
          plugins: { legend: { labels: { color: 'white' } } }
        }
      });
    }
  
    // Chart: Kehadiran Guru
    const ctxTeacher = document.getElementById('teacherAttendanceChart');
    if (ctxTeacher) {
      new Chart(ctxTeacher, {
        type: 'line',
        data: {
          labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
          datasets: [{
            label: 'Guru Hadir',
            data: [10, 9, 8, 9, 10],
            borderColor: '#f59e0b',
            backgroundColor: 'rgba(245, 158, 11, 0.2)',
            fill: true,
            tension: 0.3
          }]
        },
        options: {
          scales: {
            y: { beginAtZero: true, ticks: { color: 'white' } },
            x: { ticks: { color: 'white' } }
          },
          plugins: { legend: { labels: { color: 'white' } } }
        }
      });
    }
  });
  