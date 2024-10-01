@extends('customer.layouts.mainlayout')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">History</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">History</a></li>
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
                                        <th>Produk</th>
                                        <th>Total Harga</th>
                                        <th>Diskon</th>
                                        <th>Cetak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($transaksiGrouped as $transaksi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaksi->kasir->name_kasir }}</td>
                                        <td>{{ $transaksi->customer->nama }}</td>
                                        <td>
                                            <ul>
                                            @foreach($transaksi->details as $detail)
                                                <li>{{ $detail->produk->nama_produk }} ({{ $detail->jumlah }})</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $transaksi->diskon }}%</td>
                                        <td>
                                            <button onclick="printTransaction({{ $transaksi->id }})" class="btn btn-primary btn-sm">Cetak</button>
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