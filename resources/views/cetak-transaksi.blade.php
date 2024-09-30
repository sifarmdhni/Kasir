<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <img src="" alt="">
    <h1>Transaksi</h1>
    <p><strong>Nomor Transaksi:</strong> {{ $transaksi->id }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Kasir:</strong> {{ $transaksi->kasir->name_kasir }}</p>
    <p><strong>Customer:</strong> {{ $transaksi->customer->nama }}</p>
    
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
    
    <p><strong>Diskon:</strong>{{ number_format($transaksi->diskon, 0, ',', '.') }} % </p>
    <p><strong>Total Bayar:</strong> Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</p>

    <script>
        window.onload = function() {
            window.print();
        }
    </script>
</body>
</html>