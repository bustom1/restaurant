@extends('manager/layouts.master')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">form Tambah client</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">form Tambah client</li>
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
                <form action="{{ route('manager.client.store-p') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <label for="produk" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input name="name" type="text" class="form-control" id="produk" value="{{ old('name') }}"
                                placeholder="masukan Nama">
                            @error('name')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}"
                                placeholder="example@gmail.com">
                            @error('email')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="pass" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input name="password" type="password" class="form-control" id="pass"
                                value="{{ old('password') }}" placeholder="password">
                            @error('password')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input name="phone" type="text" class="form-control" id="phone" value="{{ old('phone') }}"
                                placeholder="masukan nomor hp">
                            @error('phone')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <select name="role" id="">
                                <option class="disable">Pilih Role </option>
                                <option value="manager">Manager</option>
                                <option value="kasir">kasir</option>
                                <option value="client">Client</option>
                            </select>
                            @error('role')
                            <small class="text-red">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <button type="button" class="btn btn-success text-center tambah">Tambah</button>
                        <button class="btn btn-danger text-center ml-3"><a class="text-light"
                                href="{{ route('manager.client.index') }}">kembali</i></a></button>
                    </div>
                </form>
            </div>
        </div>
</div>


</div>
</section>
</div>
@endsection
@section('javascript')

<script>
    $(function () {
   
    $('.tambah').click(function (e) {
    e.preventDefault();
    swal.close();
    
    // cek apakaah ada kolom yang tidak di isi
        var emptyFields = $(this).closest('form').find('input[type="text"]').filter(function () { 
            return $.trim($(this).val()) == '';
        });
// pengecekan kolom jika tidak di isi tidak menampilkan alert
        if(emptyFields.length > 0){
            $(this).closest('form').submit();
            } else {
            // Tampilkan alert sukses jika semua kolom diisi
            Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Data berhasil ditambahkan",
            showConfirmButton: false,
            timer: 1500
            });
            setTimeout(() => {
            $(this).closest('form').submit();
            }, 1500);
            }
    });
    });
    
</script>
@endsection