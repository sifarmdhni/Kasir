@extends('customer.layouts.mainlayout')

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
                    <div class="card-body text-center text-md-left">
                        <h1>Hallo {{ $customer->nama }}</h1>
                        <h4>Selamat Datang Di Customer</h4>
                        <h4>Kami Akan Melayani Anda</h4>

                        <div class="text-center text-md-right">
                            <img src="foto/asal.png" alt="Foto" class="img-fluid" style="margin: 20px 0;" width="100%">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- #/ container -->
</div>

@endsection
