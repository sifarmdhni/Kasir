@extends('layouts.mainlayout')

@section('title', 'Product')

@section('content')
<div class="container">
    <h1>Product</h1>
    
    <div class="my-5 d-flex justify-content-between">
        <a href="product-add"class="btn btn-primary">Pruduk Tersedia</a>
        <a href="product-deleted" class="btn btn-info">Show Deleted Product</a>
    </div>

    @if(Session::has('status'))
        <div class="alert alert-success" role="alert">
            {{Session::get('message')}}
        </div>
    @endif


    <div class="my-3 col-12 col-sm-8 col-md-5">
        <form action="" method="get">
        <div class="input-group mb-3">
    <input type="text" class="form-control" name="keyword" placeholder="keyword">
    <button class="input-group-text btn btn-primary">Search</button>
</div>
        </form>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>ID Kategori</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    </div>
@endsection