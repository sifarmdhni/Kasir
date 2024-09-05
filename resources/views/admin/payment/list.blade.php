@extends('admin.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{$title}}</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{$title}}</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{$title}}</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i> Tambah Pembayaran Lain
                            </button>
                        </div>
                    </div>
                    <!-- <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                            <a href="/logout">
                               <img src="foto/fotoPayment/dana.jpg" alt="Foto"  width="200" height="100" style="margin: 10px;">
                            </a>
                               <img src="foto/fotoPayment/link.png" alt="Foto"  width="100" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/liv.jpg" alt="Foto"  width="150" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/ovo.jpg" alt="Foto"  width="150" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/spayy.webp" alt="Foto"  width="150" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/flif.png" alt="Foto"  width="175" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/bni.png" alt="Foto"  width="100" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/gopay.jpeg" alt="Foto"  width="100" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/bri.png" alt="Foto"  width="100" height="100" style="margin: 10px;">
                               <img src="foto/fotoPayment/bca.jpeg" alt="Foto"  width="100" height="100" style="margin: 10px;">



                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

<div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalwallet">
                                <i class="fa fa-plus"></i> Tranfer Via E-Wallet
                            </button>
                            <img src="foto/fotoPayment/anad.png" alt="Foto"  width="15" height="15" style="margin: 10px;">
                            <img src="foto/fotoPayment/link.png" alt="Foto"  width="15" height="15" style="margin: 10px;">
                            <img src="foto/fotoPayment/liv.jpg" alt="Foto"  width="20" height="15" style="margin: 10px;">
                            <img src="foto/fotoPayment/spayy.webp" alt="Foto"  width="20" height="15" style="margin: 10px;">
                   
                        </div>
                    </div>
                     
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalbank">
                                <i class="fa fa-plus"></i> Tranfer Via Bank
                            </button>
                            <img src="foto/fotoPayment/bca.jpeg" alt="Foto"  width="15" height="15" style="margin: 10px;">
                            <img src="foto/fotoPayment/bni.png" alt="Foto"  width="15" height="15" style="margin: 10px;">
                            <img src="foto/fotoPayment/bri.png" alt="Foto"  width="15" height="15" style="margin: 10px;" border="2px">
                            <img src="foto/fotoPayment/bjbb.png" alt="Foto"  width="15" height="15" style="margin: 10px;" border="2px">
                            <img src="foto/fotoPayment/danamon.jpeg" alt="Foto"  width="15" height="15" style="margin: 10px;" border="2px">
                            <img src="foto/fotoPayment/bsi.jpeg" alt="Foto"  width="15" height="10" style="margin: 10px;" border="2px">
                            <img src="foto/fotoPayment/citi.jpeg" alt="Foto"  width="15" height="7" style="margin: 10px;" border="2px">

                        </div>
                    </div>
                    <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="left">
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalbank">
                                <i class="fa fa-plus"></i> Bayar Via Debit
                            </button>
                            <img src="foto/fotoPayment/visA.jpeg" alt="Foto"  width="15" height="10" style="margin: 10px;">
                               <img src="foto/fotoPayment/gpn.jpeg" alt="Foto"  width="15" height="10" style="margin: 10px;">
                               <img src="foto/fotoPayment/ae.png" alt="Foto"  width="15" height="10" style="margin: 10px;">
                        </div>
                    </div>
                  


                    <!-- Modal Create User -->
<div class="modal fade" id="modalwallet" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> E-Wallet Tersedia</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="{{ route('user.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <a href="/bca">
                               <img src="foto/fotoPayment/anad.png" alt="Foto"  width="50" height="50" style="margin: 10px;">
                    </a>
                        <label>DANA</label>
                    </div>
                    <div class="form-group">
                        <a href="/bca">
                    <img src="foto/fotoPayment/link.png" alt="Foto"  width="50" height="50" style="margin: 10px;">
                        </a>
                        <label>Link Aja</label>
                    </div>
                    <div class="form-group">
                    <a href="/bca">
                    <img src="foto/fotoPayment/liv.jpg" alt="Foto"  width="75" height="50" style="margin: 10px;">
                    </a>
                        <label>LIVIN By Mandiri</label>
                    </div>
                    <div class="form-group">
                    <a>
                    <img src="foto/fotoPayment/spayy.webp" alt="Foto"  width="75" height="50" style="margin: 10px;">
                    </a href="/bca">
                        <label>Shopeepay</label>
                    </div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- bagian tranfer bank -->

 <div class="modal fade" id="modalbank" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Bank Tersedia</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="{{ route('user.store')}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                    <a href="/bca">
                               <img src="foto/fotoPayment/bca.jpeg" alt="Foto"  width="50" height="50" style="margin: 10px;">
                    </a>
                        <label>BCA Mobile</label>
                    </div>
                    <div class="form-group">
                        <a href="/bca">
                    <img src="foto/fotoPayment/bni.png" alt="Foto"  width="50" height="50" style="margin: 10px;">
                        </a>
                        <label>BNI Mobile</label>
                    </div>
                    <div class="form-group">
                    <a href="/bca">
                    <img src="foto/fotoPayment/bri.png" alt="Foto"  width="50" height="50" style="margin: 10px;" border="2px">
                    </a>
                        <label>BRI Mobile</label>
                    </div>
                    <div class="form-group">
                    <a href="/bca">
                    <img src="foto/fotoPayment/bjbb.png" alt="Foto"  width="50" height="50" style="margin: 10px;" border="2px">
                    </a>
                        <label>Bank BJB</label>
                    </div>
                    <div class="form-group">
                    <a href="/bca">
                    <img src="foto/fotoPayment/danamon.jpeg" alt="Foto"  width="50" height="50" style="margin: 10px;" border="2px">
                    </a>
                        <label>Danamon</label>
                    </div>
                    <div class="form-group">
                    <a href="/bca">
                    <img src="foto/fotoPayment/bsi.jpeg" alt="Foto"  width="50" height="40" style="margin: 10px;" border="2px">
                    </a>
                        <label>BSI Bank Syariah Indonesia</label>
                    </div>
                    <div class="form-group">
                    <a href="/bca">
                    <img src="foto/fotoPayment/citi.jpeg" alt="Foto"  width="50" height="25" style="margin: 10px;" border="2px">
                    </a>
                        <label>CitiBank</label>
                    </div>
</form> 
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
                  
                    
                    <!-- <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" required>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                            <option value="3">Customer</option>
                        </select>
                    </div>
                </div> -->
                <!-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div> -->
<!-- Modal Create User -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="{{ route('user.store')}}">
                @csrf
                    <div class="form-group px-3">
                        <h4>Jumlah Saldo.............</h4>
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="number" placeholder="Masukan Jumlah Saldo......" required>
                    </div>
                    <div>
                    <div class="form-group px-4">
                        <label>PILIHAN LAINYA</label>
                        <img src="foto/fotoPayment/cmb.jpeg" alt="Foto"  width="50" height="25" style="margin: 25px;">
                        <img src="foto/fotoPayment/bv.jpeg" alt="Foto"  width="50" height="25" style="margin: 25px;">
                        <img src="foto/fotoPayment/mandi.jpeg" alt="Foto"  width="50" height="25" style="margin: 25px;">
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Lanjutkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- </div>

<!-- status pembayaran -->

<!-- Modal Edit User -->
@foreach ($data_payment as $d)
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit{{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/user/update/{{$d->id}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->name }}" class="form-control" name="name" placeholder="Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password...">
                        <small>Leave empty if you don't want to change the password</small>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" required>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option value="1" {{ $d->role_id == 1 ? 'selected' : '' }}>Admin</option>
                            <option value="2" {{ $d->role_id == 2 ? 'selected' : '' }}>Kasir</option>
                            <option value="3" {{ $d->role_id == 3 ? 'selected' : '' }}>Customer</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

<!-- Modal Hapus User -->
@foreach ($data_payment as $d)
<div class="modal fade" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/user/destroy/{{$d->id}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <h5>Apakah Anda Ingin Menghapus Data Ini?</h5>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach

@endsection
