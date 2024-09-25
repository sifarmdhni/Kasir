@extends('admin.layouts.mainlayout')

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
                            <div class="d-flex align-items-center">
                            <h4 class="card-title">Histori Transaksi Admin</h4>
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">    
                                    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Kasir</th>
            <th>Customer</th>
            <th>Total Harga</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $trans)
        <tr>
            <td>{{ $trans->id }}</td>
            <td>{{ $trans->kasir->name_kasir }}</td>
            <td>{{ $trans->customer->nama }}</td>
            <td>{{ $trans->total_harga }}</td>
            <td>
                @foreach($trans->detailTransaksi as $detail)
                    Produk: {{ $detail->produk->nama_produk }} (Jumlah: {{ $detail->jumlah }})<br>
                @endforeach
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
                <h5 class="modal-title">Create </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/customer/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kasir</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kasir...." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Custommer...." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Produk...." required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="text" class="form-control" name="total_harga" placeholder="Total Harga...." required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah...." required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Harga...." required>
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" class="form-control" name="diskon" placeholder="Diskon...." required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit User -->
 
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/customer/update/">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kasir</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Kasir...." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Custommer...." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Produk...." required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="text" class="form-control" name="total_harga" placeholder="Total Harga...." required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" placeholder="Jumlah...." required>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" name="harga" placeholder="Harga...." required>
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" class="form-control" name="diskon" placeholder="Diskon...." required>
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </div>
                </div>
                </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus User -->

<div class="modal fade" id="modalHapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus </h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/customer/destroy/">
                @csrf
                @method('DELETE')
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


@endsection
