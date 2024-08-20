@extends('layouts.mainlayout')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h1>Dashboard Kasir</h1>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('transaksis.create') }}" class="btn btn-primary btn-lg btn-block">Buat Transaksi Baru</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('produks.index') }}" class="btn btn-secondary btn-lg btn-block">Kelola Produk</a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('customers.index') }}" class="btn btn-info btn-lg btn-block">Kelola Pelanggan</a>
        </div>
    </div>
</div>
@endsection