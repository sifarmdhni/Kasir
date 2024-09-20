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
                            <form action="{{ route('transaksi.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="customer_id">Customer</label>
                                    <select class="form-control" name="customer_id" id="customer_id" required>
                                        <option value="" hidden>-- Pilih Customer --</option>
                                        @foreach ($data_customer as $customer)
                                            <option value="{{ $customer->id }}" data-diskon="{{ $customer->diskon }}">{{ $customer->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="diskon">Diskon</label>
                                    <input type="number" name="diskon" id="diskon" class="form-control" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="total_harga">Total Harga</label>
                                    <input type="number" name="total_harga" id="total_harga" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="id_kasir">Kasir</label>
                                    <select class="form-control" name="id_kasir" id="id_kasir" required>
                                        <option value="" hidden>-- Pilih kasir --</option>
                                        <!-- {{ $data_kasir->nama_kasir }} -->
                                            <option value="{{ $data_kasir->id }}">{{ $data_kasir->name_kasir }}</option>
                                       
                                    </select>
                                </div>

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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#customer_id').change(function() {
            var selectedOption = $(this).find('option:selected');
            var diskon = selectedOption.data('diskon');
            $('#diskon').val(diskon);
        });

        $('#add-row-btn').click(function() {
            let table = $('#detail-transaksi-table tbody');
            let rowCount = table.children('tr').length;
            let newRow = `
                <tr>
                    <td>
                        <input type="number" name="details[${rowCount}][id_produk]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="details[${rowCount}][harga]" class="form-control" required>
                    </td>
                    <td>
                        <input type="number" name="details[${rowCount}][jumlah]" class="form-control" required>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-row-btn">Hapus</button>
                    </td>
                </tr>
            `;
            table.append(newRow);
        });

        $(document).on('click', '.remove-row-btn', function() {
            $(this).closest('tr').remove();
        });
    });
</script>
@endsection