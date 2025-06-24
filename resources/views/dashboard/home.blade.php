@extends('dashboard.layouts.app')

@section('content')

<style>
    .key-metrics {
        display: flex; /* Mengatur elemen menjadi baris horizontal */
        justify-content: space-around; /* Memberikan ruang merata antar elemen */
        align-items: center; /* Menyelaraskan elemen secara vertikal */
        margin-bottom: 20px;
    }

    .metric {
        flex: 1; /* Membuat setiap elemen memiliki ukuran yang sama */
        margin: 0 10px;
        padding: 20px;
        background: #f0f0f5;
        text-align: center;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .metric h3 {
        margin: 0;
        font-size: 24px;
        color: #333;
    }

    .metric p {
        margin: 5px 0 0;
        font-size: 14px;
        color: #666;
    }
</style>

<div class="dashboard">
    <h1>Dashboard Analytics</h1>

    <!-- Key Metrics -->
    <div class="key-metrics">
        <div class="metric">
            <h3 id="total-users">{{ $totalUsers }}</h3>
            <p>Total Pengguna</p>
        </div>
        <div class="metric">
            <h3 id="total-posts">{{ $totalPosts }}</h3>
            <p>Total Postingan</p>
        </div>
        <div class="metric">
            <h3 id="transactions">{{ $totalKajians }}</h3>
            <p>Total Kajian</p>
        </div>
    </div>

    <!-- Charts -->
    <canvas id="lineChart" height="100"></canvas>
    <canvas id="pieChart" height="100"></canvas>
</div>

<!-- Tambahkan Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', function () {
        const lineCtx = document.getElementById('lineChart').getContext('2d');
        
        // Inisialisasi chart dengan data kosong
        const lineChart = new Chart(lineCtx, {
            type: 'line',
            data: {
                labels: [], // Label akan diisi dari API
                datasets: [{
                    label: 'Visitors',
                    data: [], // Data akan diisi dari API
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                }
            }
        });

        // Fetch data dari API
        fetch('/api/visitor-stats')
            .then(response => response.json())
            .then(data => {
                lineChart.data.labels = data.labels; // Set label
                lineChart.data.datasets[0].data = data.data; // Set data
                lineChart.update(); // Update chart dengan data baru
            })
            .catch(error => console.error('Error fetching visitor stats:', error));
    });

    // // Pie Chart for User Activity
    // const pieCtx = document.getElementById('pieChart').getContext('2d');
    // const pieChart = new Chart(pieCtx, {
    //     type: 'pie',
    //     data: {
    //         labels: ['Desktop', 'Mobile', 'Tablet'],
    //         datasets: [{
    //             label: 'User Devices',
    //             data: [60, 30, 10],
    //             backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56'],
    //             hoverOffset: 4
    //         }]
    //     },
    //     options: {
    //         responsive: true,
    //         plugins: {
    //             legend: {
    //                 display: true,
    //                 position: 'bottom',
    //             }
    //         }
    //     }
    // });
</script>
@endsection
