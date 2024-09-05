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

    <section class="content ml-3">
        <div class="row">
            <div class="col-12">
                <div class="mt-2 mb-1">
                    <h5>Jumlah Pelaku Usaha Berdasarkan Skala Usaha</h5>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-seedling"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Mikro</span>
                                <span class="info-box-number">
                                    {{ $mikro }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-leaf"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kecil</span>
                                <span class="info-box-number">
                                    {{ $kecil }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-tree"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Menengah</span>
                                <span class="info-box-number">
                                    {{ $menengah }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Besar</span>
                                <span class="info-box-number">
                                    {{ $besar }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2 mb-1">
                    <h5>Jumlah Pelaku Usaha Berdasarkan Risiko</h5>
                </div>
                <div class="row">
                    <!-- New Infoboxes for Risk -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success elevation-1"><i
                                    class="fas fa-exclamation-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Rendah</span>
                                <span class="info-box-number">
                                    {{ $rendah }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary elevation-1"><i
                                    class="fas fa-exclamation-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Menengah Rendah</span>
                                <span class="info-box-number">
                                    {{ $menengahRendah }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i
                                    class="fas fa-exclamation-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Menengah Tinggi</span>
                                <span class="info-box-number">
                                    {{ $menengahTinggi }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger elevation-1"><i
                                    class="fas fa-exclamation-circle"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tinggi</span>
                                <span class="info-box-number">
                                    {{ $tinggi }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-2 mb-1">
                    <h5>Jumlah Pelaku Usaha Berdasarkan Jenis Usaha</h5>
                </div>

                <div class="row d-flex">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Perseorangan</span>
                                <span class="info-box-number">
                                    {{ $perseorangan }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-building"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">PT</span>
                                <span class="info-box-number">
                                    {{ $pt }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-light elevation-1"><i class="fas fa-briefcase"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">CV</span>
                                <span class="info-box-number">
                                    {{ $cv }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <h5>Jumlah Tenaga Kerja di Industri Kota Balikpapan</h5>
                </div>
                <div class="row d-flex">
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Laki-Laki</span>
                                <span class="info-box-number">
                                    {{ $tenagalk }}
                                    <small>Orang</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-user"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Perempuan</span>
                                <span class="info-box-number">
                                    {{ $tenagapr }}
                                    <small>Orang</small>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-globe"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Asing</span>
                                <span class="info-box-number">
                                    {{ $tenagaasing }}
                                    <small>Pelaku Usaha</small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Persebaran Industri Tiap Kecamatan Berdasarkan Jenis Usaha</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="barChart" style="height: 400px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Jumlah Tenaga Kerja Laki-Laki dan Perempuan Tiap Kecamatan</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="tenagaKerjaChart" style="height: 400px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Persebaran Risiko Pelaku Usaha di Tiap Kecamatan</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="riskChart" style="height: 400px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Investasi Berdasarkan Skala Usaha</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="investmentPieChart" style="height: 400px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Total Investasi Berdasarkan Jenis Usaha</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="businessTypePieChart" style="height: 400px; width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        function loadData() {
            // Data dari controller
            var kecamatan = @json($kecamatan);
            var chartData = @json($chartData);
            var jenisUsaha = @json($jenisUsaha);
            var tenagaKerjaChartData = @json($tenagaKerjaChartData);
            var risiko = @json($risiko);
            var risikoData = @json($risikoData);

            // Log untuk memastikan data
            console.log('Kecamatan:', kecamatan);
            console.log('Chart Data:', chartData);
            console.log('Jenis Usaha:', jenisUsaha);
            console.log('Tenaga Kerja Data:', tenagaKerjaChartData);

            if (kecamatan.length === 0 || chartData.length === 0 || jenisUsaha.length === 0) {
                console.error('Data tidak tersedia atau kosong');
                return;
            }

            // Chart 1: Persebaran Industri Tiap Kecamatan Berdasarkan Jenis Usaha
            var labels = kecamatan;
            var datasets = [];

            jenisUsaha.forEach(function(jenis, index) {
                var data = [];
                chartData.forEach(function(item) {
                    data.push(item[jenis]);
                });

                var colors = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(75, 192, 192, 0.2)'];
                var borderColors = ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(75, 192, 192, 1)'];

                datasets.push({
                    label: jenis,
                    data: data,
                    backgroundColor: colors[index],
                    borderColor: borderColors[index],
                    borderWidth: 1
                });
            });

            var ctx = document.getElementById('barChart').getContext('2d');
            var barChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });

            // Chart 2: Jumlah Tenaga Kerja Laki-Laki dan Perempuan Tiap Kecamatan
            var tenagaKerjaLabels = kecamatan;
            var tenagaKerjaDatasets = [{
                    label: 'Laki-Laki',
                    data: tenagaKerjaChartData.map(item => item.total_lk),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: 'Perempuan',
                    data: tenagaKerjaChartData.map(item => item.total_pr),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }
            ];

            var ctx2 = document.getElementById('tenagaKerjaChart').getContext('2d');
            var tenagaKerjaChart = new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: tenagaKerjaLabels,
                    datasets: tenagaKerjaDatasets
                },
                options: {
                    responsive: true,
                    scales: {
                        x: {
                            stacked: true
                        },
                        y: {
                            stacked: true
                        }
                    }
                }
            });

            // Chart 3: Jumlah Pelaku Usaha Berdasarkan Risiko di Tiap Kecamatan
            var riskLabels = kecamatan;
            var riskDatasets = [];

            risiko.forEach(function(risk, index) {
                var data = [];
                risikoData.forEach(function(item) {
                    data.push(item[risk]);
                });

                var colors = ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ];
                var borderColors = ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)'
                ];

                riskDatasets.push({
                    label: risk,
                    data: data,
                    backgroundColor: colors[index],
                    borderColor: borderColors[index],
                    borderWidth: 1
                });
            });

            var ctx3 = document.getElementById('riskChart').getContext('2d');
            new Chart(ctx3, {
                type: 'bar',
                data: {
                    labels: riskLabels,
                    datasets: riskDatasets
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }

        document.addEventListener('DOMContentLoaded', loadData);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var totalInvestasi = @json($totalInvestasi);

            var labels = Object.keys(totalInvestasi);
            var data = Object.values(totalInvestasi);

            var ctx4 = document.getElementById('investmentPieChart').getContext('2d');
            new Chart(ctx4, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Total Investasi',
                        data: data,
                        backgroundColor: [
                            'rgba(33, 156, 144, 0.6)',
                            'rgba(255, 244, 85, 0.6)',
                            'rgba(255, 199, 0, 0.6)',
                            'rgbaa(231, 233, 237, 0.5)'
                        ],
                        borderColor: [
                            'rgb(33, 156, 144)',
                            'rgb(255, 244, 85)',
                            'rgb(255, 199, 0)',
                            'rgba(231, 233, 237, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }
            });

            // Data dari controller untuk Pie Chart Jenis Usaha
            var totalInvestmentsByType = @json($totalInvestmentsByType);
            var businessTypeLabels = Object.keys(totalInvestmentsByType);
            var businessTypeData = Object.values(totalInvestmentsByType);

            var ctx5 = document.getElementById('businessTypePieChart').getContext('2d');
            new Chart(ctx5, {
                type: 'pie',
                data: {
                    labels: businessTypeLabels,
                    datasets: [{
                        label: 'Total Investasi Jenis Usaha',
                        data: businessTypeData,
                        backgroundColor: [
                            'rgba(124, 0, 254, 0.4)',
                            'rgba(249, 228, 0, 0.4)',
                            'rgba(245, 7, 9, 0.4)',
                            'rgba(75, 192, 192, 0.2)',
                        ],
                        borderColor: [
                            'rgba(124, 0, 254, 1)',
                            'rgba(249, 228, 0, 1)',
                            'rgba(245, 7, 9, 1)',
                            'rgba(75, 192, 192, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                }
            });
        });
    </script>
@endsection
