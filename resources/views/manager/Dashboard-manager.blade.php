@extends('manager.layouts.master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('manager.client.index') }}" class="text-dark">
                            <div class="info-box mr-1">
                                <span class="info-box-icon bg-info elevation-1"><i class="fa fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Client</span>
                                    <span class="info-box-number">
                                        {{ $users->count() }}
                                        <small></small>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>

                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('order.index') }}" class="text-dark">
                            <div class="info-box mr-1 mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i
                                        class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Order</span>
                                    <span class="info-box-number">{{ $orders->count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('produk.index') }}" class="text-dark">
                            <div class="info-box mr-1 mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fa fa-utensils"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Tota Produk</span>
                                    <span class="info-box-number">{{ $produks->count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="{{ route('rating.index') }}" class="text-dark">
                            <div class="info-box mr-1 mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fa fa-star"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Total Rating</span>
                                    <span class="info-box-number">{{ $ratings->count() }}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                        </a>
                        <!-- /.info-box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

            </div>
            <!-- /.row -->

    </div>
    </section>
    </div>
@endsection
