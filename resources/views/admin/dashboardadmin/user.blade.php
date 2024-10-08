@extends('admin.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Pengguna</a></li>
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
                            <h4 class="card-title">User</h4>
                            <button type="button" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalCreate"><i class="fa fa-plus"></i>Tambah Data</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                       $no = 1;
                                    @endphp
                                    @foreach ($data_user as $row)
                                    
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->role->name }}</td>
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
            <form method="POST" action="/user/store">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" placeholder="Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email"  class="form-control" name="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password...">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" required>
                            <option value="" hidden>-- Pilih Role --</option>
                            <option value="1">Admin</option>
                            <option value="2">Kasir</option>
                            <option value="3">Customer</option>
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



<!-- Modal Edit User -->
@foreach ($data_user as $d)
<div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/user/update/{{ $d->id }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{ $d->nama_lengkap }}" class="form-control" name="name" placeholder="Nama Lengkap..." required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" value="{{ $d->email }}" class="form-control" name="email" placeholder="Email..." required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password...">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role_id" required>
                            <option <?php if($d['role_id']=="admin") echo "selected";?> value="admin">Admin</option>
                            <option <?php if($d['role_id']=="kasir") echo "selected";?> value="kasir">Kasir</option>
                            <option <?php if($d['role_id']=="customer") echo "selected";?> value="customer">Customer</option>
                           
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
@foreach ($data_user as $c)

<div class="modal fade" id="modalHapus{{ $c->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/user/destroy/{{ $c->id }}">
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
