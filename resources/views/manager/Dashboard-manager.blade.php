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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Monthly Recap Report</h5>
                    </div>
                    <div class="card-header">
                        @php
                        $bulan = now()->month; // Mengambil bulan saat ini
                        $salesMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();

                        $year = now()->years(); // Mengambil tahun saat ini
                        $salesYears = \App\Models\Order::whereYear('created_at', $year)->get();
                        @endphp
                        {{ __('Sales: :month', ['month' => now()->monthName . ', ' . now()->year]) }}

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <p class="text-center">
                                    <strong>Goal Completion</strong>
                                </p>
                                <div class="progress-group">
                                    Total Order
                                    @php
                                    $bulan = now()->month();
                                    $orderMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                    $totalOrder = $orderMonthly->count();
                                    $targetOrder = 1000;
                                    $persentaseOrder = ($totalOrder/$targetOrder)*100;
                                    @endphp
                                    <span class="float-right"><b>{{ $totalOrder }}</b>/{{ $targetOrder }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-danger" style="width: {{ $persentaseOrder }}%">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->
                                <div class="progress-group">
                                    <span class="progress-text">Purchase Pending</span>
                                    @php
                                    $bulan = now()->month();
                                    $pendingMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                    $totalPending = $pendingMonthly->where('status','proses')->count();
                                    $targetOrder = 1000;
                                    $persentasePending = ($totalPending / $targetOrder) * 100;
                                    @endphp

                                    <span class="float-right"><b>{{ $totalPending }}</b>/{{ $targetOrder }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-info" style="width: {{ $persentasePending }}%">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.progress-group -->

                                <div class="progress-group">
                                    Purchase Completed
                                    @php
                                    $bulan = now()->month();
                                    $orderCompleteMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                    $totalOrderComplete = $orderCompleteMonthly->where('status', 'bayar')->count();
                                    $targerOrder = 1000;
                                    $persentaseComplete = ($totalOrderComplete / $targetOrder) * 100;
                                    @endphp
                                    <span class="float-right"><b>{{ $totalOrderComplete }}</b>/{{ $targetOrder }}</span>
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-succes" style="width: {{ $persentaseComplete }}%">
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    @php
                                    $bulan = now()->month();
                                    $totalBayarMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                    $totalTerbayar = $totalBayarMonthly->sum('total_bayar');
                                    $targetMonth = 10000000;
                                    $persentaseTotalBayar = ($totalTerbayar / $targetMonth) * 100;

                                    $descPersentase = ($totalTerbayar > 0)? 'description-percentage text-success' :
                                    'description-percentage text-danger';
                                    $iconPersentase = ($totalTerbayar > 0)? 'fas fa-caret-up text-success' : 'fas
                                    fa-caret-down text-danger';
                                    @endphp
                                    <span class="{{ $descPersentase }}"><i class="{{ $iconPersentase }}"></i>
                                        {{ $persentaseTotalBayar }}%</span>
                                    <h5 class="description-header">Rp. {{ number_format($totalTerbayar, 0, ',', '.') }}
                                    </h5>
                                    <span class="description-text">TOTAL REVENUE</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i>
                                        0%</span>
                                    <h5 class="description-header">$10,390.90</h5>
                                    <span class="description-text">TOTAL COST</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block border-right">
                                    <span class="description-percentage text-success"><i class="fas fa-caret-up"></i>
                                        20%</span>
                                    <h5 class="description-header">$24,813.53</h5>
                                    <span class="description-text">TOTAL PROFIT</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 col-6">
                                <div class="description-block">
                                    <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i>
                                        18%</span>
                                    <h5 class="description-header">1200</h5>
                                    <span class="description-text">GOAL COMPLETIONS</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
</section>
</div>
@endsection