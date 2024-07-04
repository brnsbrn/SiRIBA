@extends('layout.main')

@section('title', 'SiRIBA | Data KBLI')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Industri Balikpapan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Data KBLI</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Persebaran Industri Tiap Kecamatan Berdasarkan Jenis Usaha</h3>
                    </div>
                    <div class="card-body">
                        {{-- <canvas id="barChart" style="height: 400px; width: 100%;"></canvas>
                    --}}
                        <canvas id="testChart" width="400" height="200"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(function() {
            // Data dari controller
            var kecamatan = @json($kecamatan);
            var chartData = @json($chartData);
            var jenisUsaha = @json($jenisUsaha);

            // Log untuk memastikan data
            console.log('Kecamatan:', kecamatan);
            console.log('Chart Data:', chartData);
            console.log('Jenis Usaha:', jenisUsaha);

            if (kecamatan.length === 0 || chartData.length === 0 || jenisUsaha.length === 0) {
                console.error('Data tidak tersedia atau kosong');
                return;
            }

            var labels = kecamatan;
            var datasets = [];

            jenisUsaha.forEach(function(jenis, index) {
                var data = [];
                chartData.forEach(function(item) {
                    data.push(item[jenis]);
                });

                var colors = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ];
                var borderColors = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)'
                ];

                datasets.push({
                    label: jenis,
                    backgroundColor: colors[index % colors.length],
                    borderColor: borderColors[index % borderColors.length],
                    borderWidth: 1,
                    data: data
                });
            });

            debugger; // Tambahkan debugger disini untuk berhenti dan memeriksa variabel

            var ctx = document.getElementById('barChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>

@endsection
