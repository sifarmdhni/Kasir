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
                                    <input type="number" name="total_harga" id="total_harga" class="form-control" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="id_kasir">Kasir</label>
                                    <select class="form-control" name="id_kasir" id="id_kasir" required>
                                        <option value="" hidden>-- Pilih kasir --</option>
                                        <option value="{{ $data_kasir->id }}">{{ $data_kasir->name_kasir }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="id_payment">Payment</label>
                                    <select class="form-control" name="id_payment" id="id_payment" required>
                                        <option value="" hidden>-- Pilih Payment --</option>
                                        @foreach ($data_payment as $payment)
                                            <option value="{{ $payment->id }}">{{ $payment->nama_pembayaran }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Input Detail Transaksi -->
                                <h3>Detail Transaksi</h3>
                                <table class="table table-bordered" id="detail-transaksi-table">
                                    <thead>
                                        <tr>
                                            <th>Produk</th>
                                            <th>Harga</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                            <th>
                                                <button type="button" class="btn btn-primary" id="add-row-btn">Tambah Detail</button>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select class="form-control product-select" name="details[0][id_produk]" required>
                                                    <option value="" hidden>-- Pilih produk --</option>
                                                    @foreach ($data_produk as $produk)
                                                        <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}"  data-stok="{{ $produk->stok }}">{{ $produk->nama_produk }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" name="details[0][harga]" class="form-control harga" required readonly>
                                            </td>
                                            <td>
                                                <input type="number" name="details[0][jumlah]" class="form-control jumlah" required>
                                            </td>
                                            <td>
                                                <input type="number" name="details[0][subtotal]" class="form-control subtotal" required readonly>
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
            calculateTotal();
        });

        function addRow() {
            let table = $('#detail-transaksi-table tbody');
            let rowCount = table.children('tr').length;
            let newRow = `
                <tr>
                    <td>
                        <select class="form-control product-select" name="details[${rowCount}][id_produk]" required>
                            <option value="" hidden>-- Pilih produk --</option>
                            @foreach ($data_produk as $produk)
                                <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}"  data-stok="{{ $produk->stok }}">{{ $produk->nama_produk }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <input type="number" name="details[${rowCount}][harga]" class="form-control harga" required readonly>
                    </td>
                    <td>
                        <input type="number" name="details[${rowCount}][jumlah]" class="form-control jumlah" required>
                    </td>
                    <td>
                        <input type="number" name="details[${rowCount}][subtotal]" class="form-control subtotal" required readonly>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger remove-row-btn">Hapus</button>
                    </td>
                </tr>
            `;
            table.append(newRow);
        }

        $('#add-row-btn').click(addRow);

        $(document).on('click', '.remove-row-btn', function() {
            $(this).closest('tr').remove();
            calculateTotal();
        });

        $(document).on('change', '.product-select', function() {
            var selectedOption = $(this).find('option:selected');
            var harga = selectedOption.data('harga');
            var row = $(this).closest('tr');
            row.find('.harga').val(harga);
            updateSubtotal(row);
        });

        $(document).on('input', '.jumlah', function() {
             var row = $(this).closest('tr');
             var selectedOption = row.find('.product-select option:selected');
             var stok = parseInt(selectedOption.data('stok')) || 0;
            var jumlah = parseInt($(this).val()) || 0;

           if (jumlah > stok) {
            alert('Jumlah melebihi stok yang tersedia.');
            $(this).val(stok); // Set jumlah ke stok maksimum
            jumlah = stok;
            }

            updateSubtotal(row);
         });


        function updateSubtotal(row) {
            var harga = parseFloat(row.find('.harga').val()) || 0;
            var jumlah = parseFloat(row.find('.jumlah').val()) || 0;
            var subtotal = harga * jumlah;
            row.find('.subtotal').val(subtotal);
            calculateTotal();
        }

        function calculateTotal() {
            var total = 0;
            $('.subtotal').each(function() {
                total += parseFloat($(this).val()) || 0;
            });
            var diskon = parseFloat($('#diskon').val()) || 0;
            var totalAfterDiscount = total * (1 - diskon / 100);
            $('#total_harga').val(totalAfterDiscount.toFixed(2));
        }
    });
</script>
@endsection