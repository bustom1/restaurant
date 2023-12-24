@extends('manager/layouts.master')
@section('css')
{{--
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

{{-- <script>
    $(function() {
            "columns": [
            { "data": "id" },
            { "data": "nama" },
            { "data": "harga" },
            // ...
        ]
            $('#data-tabel').DataTable();
        });
</script> --}}
<script>
    // alert pembayran berhasil di konfirmasi
    $(function () {
        var Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 10000,
        });

        $(".swalDefaultSuccess").click(function () {
        Toast.fire({
        icon: "success",
        title: "Yeah, Pembayaran sudah di konfirmasi !",
        });
        });

        $(".confirmDelete").click(function(event){
            event.preventDefault();

            Swal.fire({
                title: "Apa kamu yakin?",
                text: "Data akan terhapus permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // jika tmbol yes d tekan makan akan di jalankan route delete 
                    window.location.href = $(this).attr('href');
                Swal.fire({
                title: "Terhapus!",
                text: "Data sudah Terhapus!",
                icon: "success"
                });
                }
            });
        })
    });

</script>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content mt-4">
        <div class="container-fluid">
            <div class="container">
                {{-- this cozntent --}}
                <a class="btn btn-info mb-3" href="{{ route('manager.index') }}"><i class="fa fa-arrow-left"></i></a>
                <a class="btn btn-dark mb-3" href="{{ route('export.index') }}">Export Data</a>

                <table class="table table-hover" id="data-tabel">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>No Order</th>
                            <th>Order</th>
                            <th>Total Bayar</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($orders as $order)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $order->user_id }}</td>
                            <td>{{ $order->no_order }}</td>
                            <td>
                                @if ($order->order_detail && is_array($order->order_detail))
                                @foreach ($order->order_detail as $produkOrder)
                                Produk ID: {{ $produkOrder->produk_id }}<br>
                                Jumlah: {{ $produkOrder->jumlah }}<br>
                                Harga: {{ $produkOrder->harga }}<br>
                                Total Harga: {{ $produkOrder->total_harga }}<br>
                                <!-- Add more details if needed -->
                                <br>
                                @endforeach
                                @else
                                Tidak ada detail pesanan
                                @endif
                            </td>
                            <td>{{ $order->total_bayar }}</td>
                            <td>{{ $order->status }}</td>
                            <td class="text-center">
                                {{-- <a href="{{ route('order.edit', ['order' => $order->id_orders]) }}"
                                    data-toggle="modal" data-target="#modal-info-{{ $order->id_orders }}"
                                    data-id="{{ $order->id_orders }}">
                                    <i class="fa fa-solid fa-money-check text-dark"></i>
                                </a> --}}
                                <button class="btn btn-outline-success btn-sm mb-1" data-toggle="modal"
                                    data-target="#modal-info-{{ $order->id_orders }}"
                                    data-id="{{ $order->id_orders }}"><i
                                        class="fa fa-solid fa-money-check text-success  "></i>
                                </button>
                                <a class="btn btn-outline-danger btn-sm mb-1 confirmDelete" {{--
                                    onclick="return confirm('apakah kamu yakin ?Data tidak dapat diulang kembali !')"
                                    --}} href="{{ route('order.delete', ['order' => $order->id_orders]) }}"><i
                                        class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        @foreach ($orders as $order)
        <div class="modal fade" id="modal-info-{{ $order->id_orders }}">
            <div class="modal-dialog">
                <div class="modal-content bg-info">
                    <div class="modal-header">
                        <h4 class="modal-title">Info Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('order.update', $order->id_orders) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_orders" value="{{ $order->id_orders }}">

                            <div class="row mb-3">
                                <label for="order" class="col-sm-2 col-form-label">No
                                    Order</label>
                                <div class="col-sm-10">
                                    <input name="no_order" type="text" class="form-control" id="order"
                                        value="{{ $order->no_order }}">
                                    @error('no_order')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order" class="col-sm-2 col-form-label">No
                                    Order</label>
                                <div class="col-sm-10">
                                    <input name="no_order" type="text" class="form-control" id="order"
                                        value="{{ $order->no_order }}">
                                    @error('no_order')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order" class="col-sm-2 col-form-label">Bayar</label>
                                <div class="col-sm-10">
                                    <input name="bayar" type="text" class="form-control" id="order"
                                        value="{{ $order->bayar }}">
                                    @error('bayar')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order" class="col-sm-2 col-form-label">Total
                                    Bayar</label>
                                <div class="col-sm-10">
                                    <input name="total_bayar" type="text" class="form-control" id="order"
                                        value="{{ $order->total_bayar }}">
                                    @error('total_bayar')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="order" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <select name="status" autofocus>
                                        <option class="btn btn-success" value="Bayar">Terima
                                            Pembayaran</option>
                                        <option class="btn btn-warning" value="Proses">Proses</option>
                                    </select>
                                    @error('status')
                                    <small class="text-red">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <button type="submit" class="btn btn-success text-center swalDefaultSuccess"
                                    id="konfirmasiBtn">Konfirmasi</button>
                                <button class="btn btn-danger text-center ml-3"><a class="text-light"
                                        href="{{ route('order.index') }}">kembali</i></a></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        @endforeach
    </section>
</div>
@endsection