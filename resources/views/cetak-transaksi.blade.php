<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Transaksi</title>
    <style>
        .body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .th, .td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .th {
            background-color: #f2f2f2;
        }
        .iconstruk {
    display: block; /* Memastikan gambar adalah block element */
    margin: 0 auto; /* Menempatkan gambar di tengah */
    max-width: 100%; /* Memastikan gambar responsif */
    height: auto; /* Mempertahankan rasio aspek */
    border-radius: 8px; /* (Opsional) Membulatkan sudut */
    width: 200px;
    bottom: 40px;
}
.h2t {
    text-align: center; /* Memusatkan teks secara horizontal */
    margin: 20px 0; /* Margin vertikal untuk memberi ruang di atas dan bawah */
}
.p {
    text-align: center; /* Memusatkan teks secara horizontal */
    margin: 20px 0; /* Margin vertikal untuk memberi ruang di atas dan bawah */
}
.p11 {
    position: relative; /* Atau 'absolute' jika ingin diposisikan relatif terhadap elemen lain */
    right: 80px; /* Jarak dari kanan */
    margin: 20px 0; /* Margin vertikal untuk memberi ruang di atas dan bawah */
    text-align: right; /* Memusatkan teks jika diinginkan */
}

.p1 {
    text-align: right; /* Memusatkan teks secara horizontal */
    margin: 20px 0; /* Margin vertikal untuk memberi ruang di atas dan bawah */
}



    </style>
</head>
<body>
    <img src="/kasirhitamm.png" alt="foto" class="iconstruk">
    <h5 class="p">PT Reza Jaya Paku Beton Tbk.</h5>
    <P class="p">6FH6+RHP, Sidawangi, Sumber, Cirebon, West Java 45611</P>
    <p class="p">================================================================================</p>
    <h1 class="h2t">Transaksi</h1>
    <p><strong>Nomor Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Kasir:</strong> {{ $transaksi->kasir->name_kasir }}</p>
    <p><strong>Customer:</strong> {{ $transaksi->customer->nama }}</p>
    <p><strong>Pembayaran:</strong>{{ $transaksi->payment->nama_pembayaran }}</p>
    <p class="p">================================================================================</p>

    <h2>Detail Produk</h2>
    <table>
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi->detailTransaksi as $detail)
            <tr>
                <td>{{ $detail->produk->nama_produk }}</td>
                <td>{{ number_format($detail->harga, 0, ',', '.') }}</td>
                <td>{{ $detail->jumlah }}</td>
                <td>{{ number_format($detail->harga * $detail->jumlah, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p class="p">================================================================================</p>
    <p><strong>Diskon:</strong>{{ number_format($transaksi->diskon, 0, ',', '.') }} % </p>
    <p><strong>Total Bayar:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>