@extends('manager/layouts.master')

@section('css')
{{--
<link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {
    $('#data-tabel').DataTable();
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
                    <h1 class="m-0">Data Client's</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Client's</li>
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
                {{-- this content --}}
                <a class="btn btn-info mb-3" href="{{ route('manager.index') }}"><i class="fa fa-arrow-left"></i></a>
                <a class="btn btn-info mb-3" href="{{ route('manager.client.create') }}"><i
                        class="fa-solid fa-circle-plus"></i>
                    Data
                    Client's</a>
                <table class="table table-hover" id="data-tabel">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($user as $row)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->role}}</td>

                            <td class="text-center">
                                <a class="btn btn-outline-success btn-sm mb-1 "
                                    href="{{ route('manager.client.edit', ['clients' => $row->id]) }}"><i
                                        class="fa fa-edit small"></i>
                                </a>

                                <a class="btn btn-outline-danger btn-sm mb-1 "
                                    onclick="return confirm('Apakah anda yakin ?')"
                                    href="{{ route('manager.client.delete', ['clients' => $row->id]) }}"><i
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