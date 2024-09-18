@extends('admin.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Payment</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
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
                            <h4 class="card-title">Payment</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i>Tambah Pembayaran</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembayaran</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                       $no = 1;
                                    @endphp
                                    @foreach ($nama_payment as $row)
                                    
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->nama_pembayaran }}</td>
                                        <td>
                                        <img src="{{ asset('storage/' . $row->gambar) }}" alt="Gambar">
                                        </td>
                                        <td>
                                            <a href ="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                            <a href ="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                                        </td>
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
    <!-- #/ container -->
</div>

<!-- Modal Create User -->


<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/payment/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" class="form-control" name="nama_pembayaran" placeholder="Silahkan Isi..." required>
                    </div>
                    <div class="form-group">
                     <label>Pilihan Pembayaran</label>
                            <div>
                              @csrf
                          <input type="file" name="gambar" required>
                         </div>
                         <div>
                        <center><i>BANK</i></center>
                         <center>

                    <img src="foto/fotoPayment/bca.jpeg" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/bni.png" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/bri.png" alt="Foto"  width="25" height="25" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/bjbb.png" alt="Foto"  width="25" height="25" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/danamon.jpeg" alt="Foto"  width="25" height="25" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/bsi.jpeg" alt="Foto"  width="25" height="20" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/citi.jpeg" alt="Foto"  width="25" height="12" style="margin: 10px;" border="2px">
                    </center>
                    </div>
                    <div>
                        <center><i>E-Wallet</i></center>
                         <center>
                    <img src="foto/fotoPayment/anad.png" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/link.png" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/liv.jpg" alt="Foto"  width="25" height="10" style="margin: 10px;">
                    <img src="foto/fotoPayment/spayy.webp" alt="Foto"  width="25" height="10" style="margin: 10px;">
                    </center>
                    </div>
                    <div>
                        <center><i>Debit</i></center>
                         <center>
                    <img src="foto/fotoPayment/visA.jpeg" alt="Foto"  width="25" height="18" style="margin: 10px;">
                    <img src="foto/fotoPayment/gpn.jpeg" alt="Foto"  width="25" height="20" style="margin: 10px;">
                    <img src="foto/fotoPayment/ae.png" alt="Foto"  width="35" height="25" style="margin: 10px;">
                    </center>
                    </div>
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



<!-- Modal Edit User -->
@foreach ($nama_payment as $d)

<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/payment/update/{{ $d->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" class="form-control" name="name" placeholder="Silahkan Isi..." required>
                    </div>
                    <div class="form-group">
                     <label>Pilihan Pembayaran</label>
                            <div>
                          @csrf
                          <input type="file" name="image" accept="image/*" required>
                         </div>
                         <div>
                        <center><i>BANK</i></center>
                         <center>

                    <img src="foto/fotoPayment/bca.jpeg" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/bni.png" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/bri.png" alt="Foto"  width="25" height="25" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/bjbb.png" alt="Foto"  width="25" height="25" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/danamon.jpeg" alt="Foto"  width="25" height="25" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/bsi.jpeg" alt="Foto"  width="25" height="20" style="margin: 10px;" border="2px">
                    <img src="foto/fotoPayment/citi.jpeg" alt="Foto"  width="25" height="12" style="margin: 10px;" border="2px">
                    </center>
                    </div>
                    <div>
                        <center><i>E-Wallet</i></center>
                         <center>
                    <img src="foto/fotoPayment/anad.png" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/link.png" alt="Foto"  width="25" height="25" style="margin: 10px;">
                    <img src="foto/fotoPayment/liv.jpg" alt="Foto"  width="25" height="10" style="margin: 10px;">
                    <img src="foto/fotoPayment/spayy.webp" alt="Foto"  width="25" height="10" style="margin: 10px;">
                    </center>
                    </div>
                    <div>
                        <center><i>Debit</i></center>
                         <center>
                    <img src="foto/fotoPayment/visA.jpeg" alt="Foto"  width="25" height="18" style="margin: 10px;">
                    <img src="foto/fotoPayment/gpn.jpeg" alt="Foto"  width="25" height="20" style="margin: 10px;">
                    <img src="foto/fotoPayment/ae.png" alt="Foto"  width="35" height="25" style="margin: 10px;">
                    </center>
                    </div>
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
@foreach ($nama_payment as $c)

<div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/payment/destroy/{{ $c->id }}">
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
