@extends('layouts.mainlayout')

@section('title', 'Product-add')

@section('content')



@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
<div class="mt-5 col-8 m-aouto">
    <form acttion ="product" method="post" enctype="multipart/form-name">
        @csrf
        <div class="mb-3">
            <label for="name">Produk</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="kategori">Kategori Produk</label>
            <select name="kategori" id="kategori" class="'form-control">
                <option value="">select on</option>
                <option value="">Minuman</option>
                <option value="">Makanan</option>
                <option value="">Buah-buahan</option>
            </select>
        </div>

        <div class=mb-3>
            <label for="harga">Harga</label>
            <input type="text" name="harga" class="form-control" id="harga">
        </div>

        <div class=mb-3>
            <label for="stok">Stok</label>
            <input type="text" name="stok" class="form-control" id="stok">
        </div>

        <div class="mb-3">
            <button class="btn btn-success" type="submit">Save</button>
        </div>
</form>
</div>
</div>
@endsection