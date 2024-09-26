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
                                <h1 class="card-title" style="text-align: right;">Dashboard</h1>
                                <div class="table-responsive">
                                <img src="foto/DESA.png" alt="Foto" style="float: right; margin: 50px;" width="400">
                                <h1 style="text-align: left;">Hallo Mr.</h1>
                                    <h3>Selamat Datang...</h3>
                                    <div >
                                        <h6  style="margin-top: 50px;">Selamat datang! Kami sangat senang untuk berbagi waktu berkualitas dengan Anda dan membuat kenangan hari ini!</h6>
                                        <!-- <a href="#" class="button">NAON WE</a> -->
                                    </div>
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
