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
                @foreach ($data_payment as $row)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $row->nama_pembayaran }}</td>
                    <td>
                        @if($row->gambar)
                            <img src="{{ asset('storage/' . $row->gambar) }}" alt="Gambar Pembayaran" style="max-width: 100px; max-height: 100px;">
                        @else
                            No image available
                        @endif
                    </td>
                    <td>
                        <a href="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                        <a href="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- ... (other parts of the code) ... -->

<!-- Modal Create User -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/payment/store" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" class="form-control" name="nama_pembayaran" placeholder="Silahkan Isi..." required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan Pembayaran</label>
                        <div>
                            <input type="file" name="gambar" required>
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

@foreach ($data_payment as $d)
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/payment/update/{{ $d->id }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Pembayaran</label>
                        <input type="text" class="form-control" name="nama_pembayaran" value="{{ $d->nama_pembayaran }}" placeholder="Silahkan Isi..." required>
                    </div>
                    <div class="form-group">
                        <label>Pilihan Pembayaran</label>
                        <div>
                            <input type="file" name="gambar" accept="image/*">
                        </div>
                        @if($d->gambar)
                            <div>
                                @if(file_exists(public_path('storage/' . $d->gambar)))
                                    <img src="{{ asset('storage/' . $d->gambar) }}" alt="Current Image" style="max-width: 100px; max-height: 100px;">
                                    <p>Current image</p>
                                @else
                                    <p>Image file not found.</p>
                                @endif
                            </div>
                        @endif
                        <!-- ... (rest of the form content) ... -->
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
@foreach ($data_payment as $c)

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
