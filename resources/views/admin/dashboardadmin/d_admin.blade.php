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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-right">Dashboard</h1>
                        <h1 class="text-left">Hallo Mr.</h1>
                        <h3>Selamat Datang...</h3>
                        <h6 class="mt-4">Selamat datang! Kami sangat senang untuk berbagi waktu berkualitas dengan Anda dan membuat kenangan hari ini!</h6>
                        <img src="foto/DESA.png" alt="Foto" class="float-right mb-4" width="400">
                    </div>
                </div>
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

        <div class="col-12 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title mb-0">Lokasi Toko</h4>
                    <div class="border-bottom mb-3"></div>
                    <div id="world-map" style="height: 440px;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.995388605032!2d108.45887257403326!3d-6.770413866206069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1f698feaec99%3A0x909eee85e942ce8a!2sKampoeng%20IT%20(%20JAGAT%20)!5e0!3m2!1sen!2sid!4v1725246783538!5m2!1sen!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
