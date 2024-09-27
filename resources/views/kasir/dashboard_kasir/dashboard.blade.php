@extends('kasir.layouts.mainlayout')

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
                            <h3 class="card-title">Penghasilan Harian (7 Hari Terakhir)</h3>
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                <th>Tanggal</th>
                                <th>Penghasilan</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($dashboardData['income_data'] as $data)
                                <tr>
                                <td>{{ $data['date'] }}</td>
                                <td>{{ number_format($data['income'], 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
