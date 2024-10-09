@extends('seller.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Tambah</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Supplier</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
<div class="container">
    <h1>Tambah Supplier</h1>

    <form action="{{ route('seller.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_seller">Nama Supplier</label>
            <input type="text" name="nama_seller" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="no_telepon">No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection
