@extends('seller.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Data Supplier</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Supplier</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
<div class="container">
    <h1>Daftar Supplier</h1>
    <a href="{{ route('seller.create') }}" class="btn btn-primary mb-3">Tambah Supplier</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>No Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
            <tr>
                <td>{{ $seller->nama_seller }}</td>
                <td>{{ $seller->alamat }}</td>
                <td>{{ $seller->no_telepon }}</td>
                <td>
                    <form action="{{ route('seller.destroy', $seller->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
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
</div>

@endsection
