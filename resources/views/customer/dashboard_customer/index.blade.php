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
                            <h1 class="card-title" style="text-align: right;">Dashboard</h1>
                            <div class="table-responsive">
                            <img src="foto/asal.png" alt="Foto" style="float: right; margin: 50px;" width="400">
                            <h1 style="text-align: left;">Hallo  {{ $customer->nama }}</h1>
                            <h4>Selamat Datang Di Customer</h4>
                            <h4>Kami Akan Melayani Anda</h4> 
                                <div >
                                    <h5  style="margin-top: 50px;"></h5>
                                    <a href="#" class="button"></a>
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


       
        <!-- #/ container -->
    </div>
</body>
@endsection
