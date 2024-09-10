@extends('admin.layouts.mainlayout')

@section('content')

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>

                    </ol>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Transaksi</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Jenis Pembayaran</th>
                                                <th>Jumlah Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $no = 1;
                                            @endphp
                                            @foreach ($data_kategori as $row)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $row->nama_pembayaran}}</td>
                                                <td>
                                                    <a href ="#modalEdit{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href ="#modalHapus{{ $row->id }}" data-toggle="modal" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i>Hapus</a>
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

           @foreach ($data_kategori as $d)
           <div class="modal fade" id="modalEdit{{$d->id}}"tabindex="1" role="dialog" aria-hidden="true">
            <div class="dialog">
             <div class="modal-content">
             <div class="modal-header">
                  <h5 class="modal-title">edit{{$title}}</h5>
                  <button type="button"class="close"data-dismis="modal"><span>&times;</span></button>
                </div>
                <from method="POST" action="/kategoriproduk/update{{$d->id}}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>kategori produk</label>
                            <input type="text"value="{{$d->nama_kategori}}"class=from-control"name="nama_kategori" placeholder="kategori produk..."required>
                 </div>
</div>
              <div class="modal-footer">
                <button type"button"class="btn btn-secondary" data-dismis="modal"><i class="fa fa-undo"></i>close</button>
                <button type"submit"class="btn btn-primary"><i class="fa fa-save"></i>save changes</button>
               </div>
           </form>
         </div>
     </div>
</div>
@endforeach


        
        @endsection