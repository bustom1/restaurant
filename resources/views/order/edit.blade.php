@extends('manager/layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">form Update Order</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">form Update Order</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            {{-- this content --}}
            <div class="container mt-3">
                <form action="{{ route('order.update', $order->id_orders) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id_orders" value="{{ $order->id_orders }}">

                    <div class="row mb-3">
                        <label for="order" class="col-sm-2 col-form-label">No Order</label>
                        <div class="col-sm-10">
                            <input name="no_order" type="text" class="form-control" id="order"
                                value="{{ $order->no_order }}">
                            @error('no_order')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order" class="col-sm-2 col-form-label">No Order</label>
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
                            <input name="bayar" type="text" class="form-control" id="order" value="{{ $order->bayar }}">
                            @error('bayar')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="order" class="col-sm-2 col-form-label">Total Bayar</label>
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
                            <select name="status" value="{{ $order->status }}">
                                <option value="Proses">Proses</option>
                                <option value="Bayar">Terima Pembayaran</option>
                            </select>
                            @error('status')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <button type="submit" class="btn btn-success text-center">Simpan</button>
                        <button class="btn btn-danger text-center ml-3"><a class="text-light"
                                href="{{ route('order.index') }}">kembali</i></a></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

@endsection