@extends('kasir.layouts.mainlayout')

@section('content')
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Transaksi Pembelian Stok</a></li>
            </ol>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $title }}</h2>
                        <form action="{{ route('transaksi-beli.store') }}" method="POST" id="transaksiForm">
                            @csrf

                            <div class="form-group">
                                <label for="id_kasir">Kasir</label>
                                <select name="id_kasir" class="form-control" required>
                                    @foreach($data_kasir as $kasir)
                                        <option value="{{ $kasir->id }}">{{ $kasir->name_kasir }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_seller">Supplier</label>
                                <select name="id_seller" class="form-control" required>
                                    <option value="" hidden>-- Pilih Supplier --</option>
                                    @foreach($data_seller as $seller)
                                        <option value="{{ $seller->id }}">{{ $seller->nama_seller }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="id_produk">Produk</label>
                                <select name="id_produk" id="id_produk" class="form-control" required>
                                    <option value="" hidden>-- Pilih Produk --</option>
                                    @foreach($data_produk as $produk)
                                        <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}">{{ $produk->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <input type="number" name="total_harga" id="total_harga" class="form-control" readonly required>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan Transaksi</button>
                        </form>

                        <hr>

                        <h2>Daftar Transaksi</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kasir</th>
                                    <th>Seller</th>
                                    <th>Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data_transaksi as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kasir->name_kasir }}</td>
                                    <td>{{ $transaksi->seller->nama_seller }}</td>
                                    <td>{{ $transaksi->produk->nama_produk }}</td>
                                    <td>{{ $transaksi->jumlah }}</td>
                                    <td>{{ number_format($transaksi->total_harga) }}</td>
                                    <td>
                                        <form action="{{ route('transaksi-beli.destroy', $transaksi->id) }}" method="POST">
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

<script>
document.addEventListener('DOMContentLoaded', function () {
    const produkSelect = document.getElementById('id_produk');
    const jumlahInput = document.getElementById('jumlah');
    const totalHargaInput = document.getElementById('total_harga');

    function updateTotalHarga() {
        const selectedProduk = produkSelect.options[produkSelect.selectedIndex];
        const hargaProduk = selectedProduk.getAttribute('data-harga');
        const jumlah = jumlahInput.value;
        if (hargaProduk && jumlah) {
            const totalHarga = hargaProduk * jumlah;
            totalHargaInput.value = totalHarga;
        } else {
            totalHargaInput.value = '';
        }
    }

    produkSelect.addEventListener('change', updateTotalHarga);
    jumlahInput.addEventListener('input', updateTotalHarga);
});
</script>
@endsection
