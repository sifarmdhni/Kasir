@extends('customer.layouts.mainlayout')

@section('content')


    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Histori</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <center>
                                <h4 class="card-title">Halo {{ $customer->nama }}</h4>
                                <h4>Selamat Datang Di Customer</h4>
                                <h4>Kami Akan Melayani Anda</h4> 
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-1">
                        <div class="card-body">
                            <h3 class="card-title text-white">Produk Terjual</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">2 </h2>
                                <p class="text-white mb-0">1 September 2024</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-2">
                        <div class="card-body">
                            <h3 class="card-title text-white">Penghasilan</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">50.000</h2>
                                <p class="text-white mb-0">1 September 2024</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-money"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <h3 class="card-title text-white">Costomer Baru</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">1</h2>
                                <p class="text-white mb-0">1 September 2024</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-4">
                        <div class="card-body">
                            <h3 class="card-title text-white">Customer member</h3>
                            <div class="d-inline-block">
                                <h2 class="text-white">25%</h2>
                                <p class="text-white mb-0">1 September 2024</p>
                            </div>
                            <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                        </div>
                    </div>
                </div>
    <!-- #/ container -->
</div>
</div>
</div>
        <!-- #/ container -->
    </div>
</body>
@endsection
