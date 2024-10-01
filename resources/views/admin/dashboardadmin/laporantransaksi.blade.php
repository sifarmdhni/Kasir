@extends('admin.layouts.mainlayout')

@section('content')
    <div class="content-body">

        <div class="row page-titles mx-0">
            <div class="col p-md-0">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Histori</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                </ol>
            </div>
        </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                            <h4 class="card-title">Laporan Transaksi</h4>
                            
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">    
                                    <thead>
        <tr>
            <th>ID Transaksi</th>
            <th>Kasir</th>
            <th>Customer</th>
            <th>Total Harga</th>
            <th>Detail</th>
        </tr>
    </thead>
    <tbody>
        @foreach($transaksi as $trans)
        <tr>
            <td>{{ $trans->id }}</td>
            <td>{{ $trans->kasir->name_kasir }}</td>
            <td>{{ $trans->customer->nama }}</td>
            <td>{{ $trans->total_harga }}</td>
            <td>
                @foreach($trans->detailTransaksi as $detail)
                    {{ $detail->produk->nama_produk }} ({{ $detail->jumlah }})<br>
                @endforeach
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




@endsection
