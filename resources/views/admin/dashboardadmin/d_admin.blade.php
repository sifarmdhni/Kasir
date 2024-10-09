@extends('admin.layouts.mainlayout')

@section('content')
    <div class="content-body">
        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h3>DASHBOARD KASIR</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="card gradient-1 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="card-title text-white">Produk Terjual</h3>
                            <h2 class="text-white">{{ $dashboardData['products_sold'] }}</h2>
                            <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                            <i class="fa fa-shopping-cart display-5 opacity-5"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="card gradient-2 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="card-title text-white">Penghasilan</h3>
                            <h2 class="text-white">{{ number_format($dashboardData['daily_income'], 0, ',', '.') }}</h2>
                            <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                            <i class="fa fa-money display-5 opacity-5"></i>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="card gradient-3 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="card-title text-white">Customer Baru</h3>
                            <h2 class="text-white">{{ $dashboardData['new_customers'] }}</h2>
                            <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                            <i class="fa fa-user display-5 opacity-5"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-4">
                    <div class="card gradient-4 shadow-sm">
                       <div class="card-body text-center">
                          <h3 class="card-title text-white">Total Stok</h3>
                          <h2 class="text-white">{{ $dashboardData['total_stock'] }}</h2>
                          <p class="text-white mb-0">{{ \Carbon\Carbon::now()->format('d F Y') }}</p>
                          <i class="fa fa-cubes display-5 opacity-5"></i>
                       </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Penghasilan Mingguan (4 Minggu Terakhir)</h3>
                            <canvas id="weeklyIncomeChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Penghasilan Bulanan (12 Bulan Terakhir)</h3>
                            <canvas id="monthlyIncomeChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">Penghasilan Tahunan (5 Tahun Terakhir)</h3>
                            <canvas id="yearlyIncomeChart"></canvas>
                        </div>
                    </div>
                </div>
                
                <script>
                    // Weekly Income Chart
                    const weeklyCtx = document.getElementById('weeklyIncomeChart').getContext('2d');
                    const weeklyIncomeData = @json($dashboardData['weekly_income_data']);
                    
                    const weeklyLabels = weeklyIncomeData.map(data => data.week);
                    const weeklyIncomes = weeklyIncomeData.map(data => data.income);
                
                    const weeklyIncomeChart = new Chart(weeklyCtx, {
                        type: 'bar',
                        data: {
                            labels: weeklyLabels,
                            datasets: [{
                                label: 'Penghasilan Mingguan',
                                data: weeklyIncomes,
                                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                borderColor: 'rgba(75, 192, 192, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                
                    // Monthly Income Chart
                    const monthlyCtx = document.getElementById('monthlyIncomeChart').getContext('2d');
                    const monthlyIncomeData = @json($dashboardData['monthly_income_data']);
                    
                    const monthlyLabels = monthlyIncomeData.map(data => data.month);
                    const monthlyIncomes = monthlyIncomeData.map(data => data.income);
                
                    const monthlyIncomeChart = new Chart(monthlyCtx, {
                        type: 'bar',
                        data: {
                            labels: monthlyLabels,
                            datasets: [{
                                label: 'Penghasilan Bulanan',
                                data: monthlyIncomes,
                                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                borderColor: 'rgba(153, 102, 255, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                
                    // Yearly Income Chart
                    const yearlyCtx = document.getElementById('yearlyIncomeChart').getContext('2d');
                    const yearlyIncomeData = @json($dashboardData['yearly_income_data']);
                    
                    const yearlyLabels = yearlyIncomeData.map(data => data.year);
                    const yearlyIncomes = yearlyIncomeData.map(data => data.income);
                
                    const yearlyIncomeChart = new Chart(yearlyCtx, {
                        type: 'bar',
                        data: {
                            labels: yearlyLabels,
                            datasets: [{
                                label: 'Penghasilan Tahunan',
                                data: yearlyIncomes,
                                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                borderColor: 'rgba(255, 159, 64, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
                

                
                
         </div>
    </div>
</div>

@endsection
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
