@extends('layouts.mainlayout')

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
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kasir</th>
                                        <th>No_telpon</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Poto Kasir</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($data_kasir as $row)
                                    {{-- @dd($row->diskon) --}}
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$row->name_kasir}}</td>
                                        <td>{{$row->no_telepon}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->password}}</td>
                                        <td>{{$row->foto_kasir}}</td>
                                        <td>{{$row->jenis_kelamin}}</td>
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
                <h5 class="modal-title">Create {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/kasir/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Kasir</label>
                        <input type="text" class="form-control" name="name_kasir" placeholder="Nama Kasir...." required>
                    </div>
                    <div class="form-group">
                        <label>No.telp</label>
                        <input type="number" class="form-control" name="no_telepon" placeholder="No_telepon...." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email...." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="number" class="form-control" name="password" placeholder="Password...." required>
                    </div>
                    <div class="form-group">
                        <label>Foto Kasir</label>
                        <input type="number" class="form-control" name="foto_kasir" placeholder="Foto_kasir...." required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <p><input type="radio" class="form-control" name="jenis_kelamin" value="pria" required>Pria</p>
                        <p><input type="radio" class="form-control" name="jenis_kelamin" value="perempuan" required>Perempuan</p>
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
@foreach ($data_kasir as $d)
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/kasir/update/{{$d->id}}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Customer</label>
                        <input type="text" class="form-control" name="name" value="{{$d->name}}" placeholder="Nama...." required>
                    </div>
                    
                    <div class="form-group">
                        <label>No.telp</label>
                        <input type="text" class="form-control" name="no_telp" value="{{$d->no_telp}}" placeholder="No_telp...." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" name="email" value="{{$d->email}}" placeholder="Email...." required>
                    </div>
                    
                    <div class="form-group">
                        <label>Diskon</label>
                        <input type="text" class="form-control" name="diskon" value="{{$d->diskon}}" placeholder="diskon...." required>
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
@endforeach

<!-- Modal Hapus User -->
@foreach ($data_kasir as $d)
<div class="modal fade" id="modalHapus{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/kasir/destroy/{{$d->id}}">
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
@endforeach

@endsection
