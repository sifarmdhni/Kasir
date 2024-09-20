@extends('customer.layouts.mainlayout')

@section('content')

<body class="h-100" style="background-image: url('aasd.jpeg'); background-size: cover; background-position: center; background-repeat: no-repeat;">
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
                                <h4>Selamat Datang Di Customor</h4>
                                <h4>Kami Akan Melayani Anda</h4> 
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
</body>
@endsection
