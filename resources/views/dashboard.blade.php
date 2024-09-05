@extends('layouts.mainlayout')

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


            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data pembeli</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>harga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Bara</td>
                                                <td>50.000</td>
                                                <td>
                                                    <a href ="#" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href ="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-15 col-lg-12 col-sm-12 col-xxl-12">
                        <div class="card">
                            <div class="card-body">
                                    <h4 class="card-title mb-0">Lokasi Toko</h4>
                                    <div>-------------------------------</div>
                                <div id="world-map" style="height: 470px;">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.995388605032!2d108.45887257403326!3d-6.770413866206069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f1f698feaec99%3A0x909eee85e942ce8a!2sKampoeng%20IT%20(%20JAGAT%20)!5e0!3m2!1sen!2sid!4v1725246783538!5m2!1sen!2sid" width="965" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>

            <!-- #/ container -->
        </div>
        <!-- #/ container -->
    </div>
@endsection
