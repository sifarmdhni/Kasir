@extends('kasir.layouts.mainlayout')

@section('content')

<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">transaksi</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">transaksi</a></li>
            </ol>
        </div>
    </div>


    <div class="container-fluid">
    <div class="row">
     <div class="col-12">
     <div class="card">
     <div class="card-header">
    <div class="container mt-4">
        <h2>Buat Transaksi Baru</h2>
        {{-- @dd($data_transaksi) --}}
        <form action="" method="POST">
            @csrf
            @foreach ($data_transaksi as $item)
                {{-- @dd($item->customer) --}}
                <!-- Input Transaksi -->
                <div class="form-group">
                    <label for="customer_id">Customer ID</label>
                    {{-- <input type="number" name="customer_id" id="customer_id" class="form-control" required> --}}
                    <select class="form-control" name="" id="">
                    <option value="" hidden>-- customer --</option>
                        <option value="{{ $item->customer->id }}">{{ $item->customer->nama }}</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="diskon">Diskon</label>
                    <input type="number" name="diskon" id="diskon" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="number" name="total_harga" id="total_harga" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="id_kasir">ID Kasir</label>
                    <input type="number" name="id_kasir" id="id_kasir" class="form-control" required>
                </div>
            @endforeach
            <!-- Input Detail Transaksi -->
            <h3>Detail Transaksi</h3>
            <table class="table table-bordered" id="detail-transaksi-table">
                <thead>
                    <tr>
                        <th>Produk ID</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>
                            <button type="button" class="btn btn-primary" id="add-row-btn">Tambah Detail</button>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="number" name="details[0][id_produk]" class="form-control" required>
                        </td>
                        <td>
                            <input type="number" name="details[0][harga]" class="form-control" required>
                        </td>
                        <td>
                            <input type="number" name="details[0][jumlah]" class="form-control" required>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger remove-row-btn">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn btn-success">Simpan Transaksi</button>
        </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
</div>


    <script>
        document.getElementById('add-row-btn').addEventListener('click', function() {
            let table = document.getElementById('detail-transaksi-table').getElementsByTagName('tbody')[0];
            let rowCount = table.rows.length;
            let newRow = table.insertRow(rowCount);

            let cell1 = newRow.insertCell(0);
            let element1 = document.createElement("input");
            element1.type = "number";
            element1.name = "details[" + rowCount + "][id_produk]";
            element1.className = "form-control";
            element1.required = true;
            cell1.appendChild(element1);

            let cell2 = newRow.insertCell(1);
            let element2 = document.createElement("input");
            element2.type = "number";
            element2.name = "details[" + rowCount + "][harga]";
            element2.className = "form-control";
            element2.required = true;
            cell2.appendChild(element2);

            let cell3 = newRow.insertCell(2);
            let element3 = document.createElement("input");
            element3.type = "number";
            element3.name = "details[" + rowCount + "][jumlah]";
            element3.className = "form-control";
            element3.required = true;
            cell3.appendChild(element3);

            let cell4 = newRow.insertCell(3);
            let removeButton = document.createElement("button");
            removeButton.className = "btn btn-danger remove-row-btn";
            removeButton.type = "button";
            removeButton.innerHTML = "Hapus";
            removeButton.onclick = function() {
                newRow.remove();
            };
            cell4.appendChild(removeButton);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row-btn')) {
                e.target.closest('tr').remove();
            }
        });
    </script>
@endsection
