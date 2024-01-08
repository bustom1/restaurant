@extends('manager/layouts.master')

@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection

@section('javascript')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function () {
        // data tabel
        $('#data-tabel').DataTable();

        // konfirmasi delete
        $(".deleteButton").click(function (event) {
            event.preventDefault();
            
            const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
            confirmButton: "btn btn-success",
            cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Apa kamu yakin?",
                text: "Data akan terhapus secara permanen!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Batal!",
                reverseButtons: true
            }).then((result) => {
            if (result.isConfirmed) {
                // hapus data 
                setTimeout(() => {
                window.location.href = $(this).attr('href');
                }, 1500);
                
            swalWithBootstrapButtons.fire({
            title: "Terhapus!",
            text: "Data berhasil terhapus 👌",
            icon: "success"
            });
            } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
            ) {
            swalWithBootstrapButtons.fire({
            title: "Hapus data dibatalkan",
            text: "Selamat data anda aman 😊 ",
            icon: "error"
            });
            }
            });
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
                    <h1 class="m-0">Data Product's</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Product's</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content mt-4 ml-3">

        <div class="container-fluid">
            {{-- this content --}}
            <a class="btn btn-info mb-3" href="{{ route('manager.index') }}"><i class="fa fa-arrow-left"></i></a>
            <a class="btn btn-info mb-3" href="{{ route('produk.create') }}">+
                Data Product's</a>
            <div class="tbl">
                <table class="table table-hover border" id="data-tabel">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Kode produk </th>
                            <th>Gambar</th>
                            <th>Nama Product</th>
                            <th>Kategori Produk</th>
                            <th>Harga Product</th>
                            <th>Stok Product</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produks as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $row->kode_produks }}</td>
                            <td><img src="{{ asset('uploads/' . $row->gambar_produks) }}" alt="gambar" width="100px">
                            </td>

                            <td>{{ $row->nama_produks }}</td>
                            <td>{{  $row->ProdukKategory->nama_kategori }}</td>
                            <td> @currency($row->harga_produks)</td>
                            <td>{{ $row->stok_produks }}</td>
                            <td>{{ $row->deskripsi_produks }}</td>

                            <td class="text-center">
                                <a class="btn btn-outline-success btn-sm mb-1 "
                                    href="{{ route('produk.edit', $row->id_produks) }}"><i class="fa fa-edit small"></i>
                                </a>
                                <a class="btn btn-outline-danger btn-sm mb-1 deleteButton"
                                    href="{{ route('produk.delete', $row->id_produks) }}"><i class="fa fa-trash"></i>
                                </a>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="small">
                    <i>
                        {{ __('Keterangan kategori produk:') }}
                        <span>
                            @foreach ($kategori as $item)
                            <small class="small text-bold">{{ $item->id_produk_kategories }}. {{
                                $item->nama_kategori }}
                            </small>
                            @endforeach
                        </span>
                    </i>
                </div>
            </div>

    </section>
</div>
@endsection