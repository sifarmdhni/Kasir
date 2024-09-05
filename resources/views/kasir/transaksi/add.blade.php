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
</div>

<!-- row -->

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <form method="POST" action="/transaksi/store">
                    @csrf
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">{{$title}}</h4>
                        </div>
                    </div>
                    <hr/>

                    <button class="btn btn-primary" type="button" data-target="#modalCreate" data-toggle="modal">
                        <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    <hr/>
                    <div class="table-responsive">
                        <table class="table table-bordered"> <!-- Fixed typo: 'table-berdered' to 'table-bordered' -->
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Assuming you will loop through the data here -->
                                <tr>
                                    <td>1</td> <!-- Example row data, replace with loop -->
                                    <td>Sample Product</td>
                                    <td>10000</td>
                                    <td>2</td>
                                    <td>20000</td>
                                </tr>
                                <tr>
                                    <td colspan="4">Diskon</td> <!-- Fixed typo: 'colspan"4"' to 'colspan="4"' -->
                                    <td>5000</td> <!-- Example discount, replace with actual data -->
                                </tr>
                                <tr>
                                    <td colspan="4">Total Bayar</td> <!-- Fixed typo: 'colspan"4"' to 'colspan="4"' -->
                                    <td>15000</td> <!-- Example total, replace with actual data -->
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr/>

                    <div class="row">
                        <div class="col-md-6"> <!-- Fixed typo: 'col-nd-6' to 'col-md-6' -->
                            <div class="form-group">
                                <label>No Transaksi</label>
                                <input type="text" class="form-control" name="no_transaksi" value="NT-001" readonly required> <!-- Fixed typo: 'readoly' to 'readonly' -->
                            </div>
                            <div class="form-group">
                                <label>Tgl Transaksi</label>
                                <input type="text" class="form-control" value="{{date('d/M/Y')}}" readonly required> <!-- Fixed typo: 'readoly' to 'readonly' -->
                            </div>
                        </div>
                        <div class="col-md-6"> <!-- Fixed typo: 'col-nd-6' to 'col-md-6' -->
                            <div class="form-group">
                                <label>Uang Pembeli</label>
                                <input type="number" class="form-control" name="uang_pembeli" required>
                            </div>
                            <div class="form-group">
                                <label>Kembalian</label>
                                <input type="text" class="form-control" name="kembalian" readonly required> <!-- Fixed typo: 'readoly' to 'readonly' -->
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
                        <a href="/transaksi" class="btn btn-danger"><i class="fa fa-undo"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- #/ container -->

<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create {{$title}}</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
            </div>
            <form method="POST" action="/transaksi/cart">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk..." required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <select class="form-control" name="id_produk" required>
                            <option value="" hidden>-- Pilih Kategori Produk --</option>
                            <!-- Populate options dynamically -->
                        </select>
                    </div>
                </div>
                <div id="tampil_produk"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
