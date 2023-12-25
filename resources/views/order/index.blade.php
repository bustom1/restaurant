@extends('manager/layouts.master')
@section('css')
    {{--
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

@endsection

@section('content')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            @if(session('payment_notification'))
                // Show SweetAlert for payment notification
                Swal.fire({
                    title: 'Pembayaran',
                    text: 'Silahkan menuju ke kasir untuk melakukan pembayaran, Terimakasih',
                    icon: 'info',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            @endif
        });

    </script>
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
                                    <td>{{ $order->user->name }}</td>
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
                                    <td>Rp.{{ number_format($order->total_bayar, 0, ',', '.') }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-outline-success btn-sm mb-1 "
                                            href="{{ route('order.edit', ['order' => $order->id_orders]) }}"><i
                                                class="fa fa-edit small"></i>
                                        </a>
                                        <a class="btn btn-outline-danger btn-sm mb-1 "
                                            onclick="return confirm('Apakah anda yakin ?')"
                                            href="{{ route('order.delete', ['order' => $order->id_orders]) }}"><i
                                                class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection
