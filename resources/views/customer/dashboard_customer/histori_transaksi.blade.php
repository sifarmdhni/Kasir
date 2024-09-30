@extends('customer.layouts.mainlayout')

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
                            <h4 class="card-title">Histori Transaksi Customer</h4>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Kasir</th>
                                        <th>Nama Customer</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th>Total Harga</th>
                                        <th>Diskon</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($detailTransaksi as $detail)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $detail->transaksi->kasir->name_kasir }}</td>
                                        <td>{{ $detail->transaksi->customer->nama }}</td>
                                        <td>{{ $detail->produk->nama_produk }}</td>
                                        <td>{{ $detail->harga }}</td>
                                        <td>{{ $detail->jumlah }}</td>
                                        <td>{{ $detail->transaksi->total_harga }}</td>
                                        <td>{{ $detail->transaksi->diskon }}</td>
                                        <td>
                                            <button onclick="printTransaction({{ $detail->transaksi->id }})" class="btn btn-primary btn-sm">Cetak</button>
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

<script>
function printTransaction(transactionId) {
    var printWindow = window.open("{{ route('cetak.transaksi', '') }}/" + transactionId, "_blank", "width=800,height=600");
    printWindow.focus();
}
</script>
@endsection