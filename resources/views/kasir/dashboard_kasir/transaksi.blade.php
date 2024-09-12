@extends('kasir.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Customer</a></li>
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
                            <h4 class="card-title">Data Transaksi</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>ID_payment</th>
                                        <th>ID_Customer</th>
                                        <th>Customer</th>
                                        <th>Diskon</th>
                                        <th>Total Harga</th>
                                        <th>ID_Kasir</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_transaksi as $row)
                                    <tr>
                                        <td>{{ $row->id_payment }}</td>
                                        <td>{{ $row->customer_id }}</td>
                                        <td>{{ $row->customer }}</td>
                                        <td>{{ $row->diskon }}%</td>
                                        <td>{{ $row->total_harga }}</td>
                                        <td>{{ $row->id_kasir }}</td>
                                        <td>
                                            <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger">
                                                <i class="fa fa-trash"></i> Hapus
                                            </a>
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
                <h5 class="modal-title">Tambah Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/transaksi/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Payment</label>
                        <input type="text" class="form-control" name="id_payment" placeholder="ID Payment" required>
                    </div>
                    <div class="form-group">
                        <label>ID Customer</label>
                        <input type="text" class="form-control" name="customer_id" placeholder="ID Customer" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="customer_name" placeholder="Nama Customer" required>
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <div class="input-group mb-3">
                            <input type="number" name="diskon" placeholder="Diskon" class="form-control" required>
                            <div class="input-group-append"><span class="input-group-text">%</span></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" class="form-control" name="total_harga" placeholder="Total Harga" required>
                    </div>
                    <div class="form-group">
                        <label>ID Kasir</label>
                        <input type="text" class="form-control" name="id_kasir" placeholder="ID Kasir" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                <h5 class="modal-title">Edit Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/transaksi/update">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>ID Payment</label>
                        <input type="text" class="form-control" name="id_payment"  value="{{ $d->nama_kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label>ID Customer</label>
                        <input type="text" class="form-control"  name="id_customer"  value="{{ $d->nama_kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="customer"  value="{{ $d->nama_kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="number" class="form-control"  name="diskon"  value="{{ $d->nama_kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label>Total Harga</label>
                        <input type="number" class="form-control"mname="total_harga"  value="{{ $d->nama_kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label>ID Kasir</label>
                        <input type="text" class="form-control"  name="id_kasir"  value="{{ $d->nama_kategori }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
