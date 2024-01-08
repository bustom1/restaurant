@extends('manager.layouts.master')
@section('javascript')
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection

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

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card ">
                        <div class="card-header bg-info">
                            <h5 class="card-title">Monthly Recap Report</h5>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                {{-- <div class="btn-group">
                                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-wrench"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                    <a href="#" class="dropdown-item">Action</a>
                                    <a href="#" class="dropdown-item">Another action</a>
                                    <a href="#" class="dropdown-item">Something else here</a>
                                    <a class="dropdown-divider"></a>
                                    <a href="#" class="dropdown-item">Separated link</a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button> --}}
                            </div>
                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body bg-secondary">
                        <div class="row">
                            <div class="col">

                                @php
                                $bulan = now()->month; // Mengambil bulan saat ini
                                $salesMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();

                                $year = now()->years(); // Mengambil tahun saat ini
                                $salesYears = \App\Models\Order::whereYear('created_at', $year)->get();
                                @endphp
                                {{ __('Sales: :month', ['month' => now()->monthName . ', ' . now()->year]) }}

                                <!-- TABLE: LATEST ORDERS -->
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title text-dark "><b>Data Penjualan</b></h4>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped text-dark">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Order ID</th>
                                                    <th>No Ordder</th>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                    <th>Total Terbayar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $row )

                                                <tr>
                                                    <td>{{$loop->iteration}}.</td>
                                                    <td><a href="{{ asset('assets/pages/examples/invoice.html') }}">Ords{{
                                                            $row->id_orders
                                                            }}</a>
                                                    </td>
                                                    <td>{{ $row->no_order }}</td>
                                                    <td>{{ $row->user_id }}</td>
                                                    <td><span class="badge {{ ($row->status == 'Bayar')? 'badge-success' :
                                                    'badge-warning';}}  ">{{ $row->status
                                                            }}
                                                        </span>
                                                        @if ($row->status == 'Bayar')
                                                        <i class="fa fa-solid fa-check text-success"></i>
                                                        @endif
                                                        @if ($row->status == 'Proses')
                                                        <i class="fa fa-solid fa-hourglass-half text-warning"></i>
                                                        @endif

                                    <!-- TABLE: LATEST ORDERS -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title text-dark "><b>Data Penjualan</b></h4>
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped text-dark">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Order ID</th>
                                                        <th>No Order</th>
                                                        <th>No Meja</th>
                                                        <th>Status</th>
                                                        <th>Total Terbayar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $row)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}.</td>
                                                            <td><a
                                                                    href="{{ asset('assets/pages/examples/invoice.html') }}">Ords{{ $row->id_orders }}</a>
                                                            </td>
                                                            <td>{{ $row->no_order }}</td>
                                                            <td>{{ $row->user->name }}</td>
                                                            <td><span
                                                                    class="badge {{ $row->status == 'Bayar' ? 'badge-success' : 'badge-warning' }}  ">{{ $row->status }}
                                                                </span>
                                                                @if ($row->status == 'Bayar')
                                                                    <i class="fa fa-solid fa-check text-success"></i>
                                                                @endif
                                                                @if ($row->status == 'Proses')
                                                                    <i
                                                                        class="fa fa-solid fa-hourglass-half text-warning"></i>
                                                                @endif

                                                            </td>
                                                            <td>
                                                                @if ($row->total_bayar == '0')
                                                                    Lunas
                                                                @else
                                                                    Rp
                                                                    {{ number_format($row->total_bayar, 0, ',', '.') }}
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </div>
                                <!-- /.col -->


                            {{-- /.row --}}
                        </div>
                        <!-- /.row -->
                        <div class="row bg-dark pt-2">
                            <div class="col">
                                <p class="text-center">
                                    <strong>{{ ('Pencapaian Target') }}</strong>
                                </p>
                            </div>
                            <!-- /.row -->
                            <div class="row bg-dark pt-2">
                                <div class="col">
                                    <p class="text-center">
                                        <strong>{{ 'Pencapaian Target' }}</strong>
                                    </p>
                                </div>
                            </div>
                            <div class="row bg-dark mb-5 p-4">
                                <div class="col">
                                    <div class="progress-group">
                                        Total Order
                                        @php
                                            $bulan = now()->month();
                                            // mengambil data order sesuai orderan di bulan tertentu
                                            $orderMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                            $totalOrder = $orderMonthly->count();
                                            $targetOrder = 1000;
                                            $persentaseOrder = ($totalOrder / $targetOrder) * 100;
                                        @endphp
                                        <span class="float-right"><b>{{ $totalOrder }}</b>/{{ $targetOrder }}</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: {{ $persentaseOrder }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        <span class="progress-text">Pembelian dalam proses</span>
                                        @php
                                            $bulan = now()->month();
                                            // mengambil data order sesuai orderan di bulan tertentu
                                            $pendingMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                            $totalPending = $pendingMonthly->where('status', 'Proses')->count();
                                            $targetOrder = 1000;
                                            $persentasePending = ($totalPending / $targetOrder) * 100;
                                        @endphp

                                        <span class="float-right"><b>{{ $totalPending }}</b>/Proses</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-info" style="width: {{ $persentasePending }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                    <div class="progress-group">
                                        Pembelian Selesai
                                        @php
                                            $bulan = now()->month();
                                            // mengambil data order sesuai orderan di bulan tertentu
                                            $orderCompleteMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                            $totalOrderComplete = $orderCompleteMonthly->where('status', 'Bayar')->count();
                                            $targerOrder = 1000;
                                            $persentaseComplete = ($totalOrderComplete / $targetOrder) * 100;
                                        @endphp
                                        <span class="float-right"><b>{{ $totalOrderComplete }}</b>/selesai</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-succes" style="width: {{ $persentaseComplete }}%">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.progress-group -->
                                </div>
                                <!-- /.col -->

                            
                            <div class="col-md-3">
                                <div class="description-block border-right">
                                    @php
                                    $bulan = now()->month();
                                    // mengambil data order sesuai orderan di bulan tertentu
                                    $totalBayarMonthly = \App\Models\Order::whereMonth('created_at', $bulan)
                                    ->where('status', 'Bayar')
                                    ->get();

                                    $totalTerbayar = $totalBayarMonthly->sum('total_bayar');
                                    $targetMonth = 10000000;
                                    $persentaseTotalBayar = ($totalTerbayar / $targetMonth) * 100;
                                    // icon persentase
                                    $descPersentase = ($totalTerbayar > 0)? 'description-percentage text-success' :
                                    'description-percentage text-danger';
                                    $iconPersentase = ($totalTerbayar > 0)? 'fas fa-caret-up text-success' : 'fas
                                    fa-caret-down text-danger';
                                            $profitText = $totalTerbayar > 0 ? 'text-success' : 'text-danger';
                                        @endphp
                                        <span class="{{ $descPersentase }}"><i class="{{ $iconPersentase }}"></i>
                                            {{ $persentaseTotalBayar }}%</span>
                                        <h5 class="description-header {{ $profitText }}">Rp.
                                            {{ number_format($totalTerbayar, 0, ',', '.') }}
                                        </h5>
                                        <span class="description-text">TOTAL PENDAPATAN</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>

                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="description-block border-right">
                                    @php
                                    $bulan = now()->month();
                                    // mengambil data order sesuai orderan di bulan tertentu
                                    $totalBayarMonthly = \App\Models\Order::whereMonth('created_at', $bulan)
                                    ->where('status', 'Bayar')
                                    ->get();
                                    // Menghitung total terbayar berdasarkan order yang sudah dibayar
                                    $totalTerbayar = $totalBayarMonthly->sum('total_bayar');

                                    $targetProfit_bulan = 100000000;
                                    $modal = 10000000;

                                    // Menghitung keuntungan
                                    $keuntungan = $totalTerbayar - $modal;

                                    // Menghitung persentase keuntungan
                                    $persentaseKeuntungan = ($keuntungan / $targetProfit_bulan) * 100;
                                    // icon persentase
                                    $iconPersentase = ($keuntungan > 0)? 'fas fa-caret-up text-success' : 'fas
                                    fa-caret-down text-danger';
                                            $descPersentase = $keuntungan > 0 ? 'description-percentage text-success' : 'description-percentage text-danger';
                                            $profitText = $keuntungan > 0 ? 'text-success' : 'text-danger';
                                        @endphp
                                        <span class="{{ $iconPersentase }}"><i class="{{ $descPersentase }}"></i>
                                            {{ $persentaseKeuntungan }}%</span>
                                        <h5 class="description-header {{ $profitText }}">
                                            Rp. {{ number_format($keuntungan, 0, '.', '.') }}</h5>
                                        <span class="description-text">TOTAL KEUNTUNGAN</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>

                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-md-3">
                                <div class="description-block ">
                                    @php
                                    $bulan = now()->month();
                                    // mengambil data order sesuai orderan di bulan tertentu
                                    $orderMonthly = \App\Models\Order::whereMonth('created_at', $bulan)->get();
                                    $totalOrder = $orderMonthly->count();
                                    $targetOrder = 1000;
                                    $persentaseOrder = ($totalOrder/$targetOrder)*100;

                                    // icon persentase
                                    $iconPersentase = ($totalOrder > 0)? 'fas fa-caret-up text-success' : 'fas
                                    fa-caret-down text-danger';
                                    $descPersentase = ($totalOrder > 0)? 'description-percentage text-success' :
                                    'description-percentage text-danger';
                                    $textTotal = ($totalOrder > 0 )? 'text-success': 'text-danger';
                                    @endphp
                                    <span class="description-percentage {{ $descPersentase }} "><i
                                            class="fas {{ $iconPersentase }}"></i>
                                        {{ $persentaseOrder }}%</span>
                                    <h5 class="description-header {{ $textTotal }}">{{ $totalOrder }}</h5>
                                    <span class="description-text">PENCAPAIAN TARGET</span>
                                </div>
                                <!-- /.col -->

                            </div>
                            {{-- /.row --}}
                        </div>
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
<script>
    // Contoh data dan konfigurasi
    var pieChartData = {
        labels: ["Label 1", "Label 2", "Label 3"],
        datasets: [{
            data: [30, 50, 20],
            backgroundColor: ["#f56954", "#00a65a", "#f39c12"]
        }]
    };

    // Contoh konfigurasi untuk pie chart
    var pieChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
    };

    // Ambil elemen canvas dengan ID "pieChart"
    var pieChartCanvas = document.getElementById('pieChart').getContext('2d');

    // Buat objek Chart
    var pieChart = new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieChartData,
        options: pieChartOptions
    });
</script>
