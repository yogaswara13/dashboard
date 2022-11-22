@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('content')


{{--===================== header ==========================--}}
<section class="content-header">
    <div class="container-fluid">
          <h1> Kelola Pengguna </h1>
    </div><!-- akhir container-fluid -->
</section>
{{-- akhir content header --}}
{{--===================== main content ==========================--}}

<section class="content-header">
    <div class="card card-info margin-auto">
        <div class="card-header bg-orange ">
        <h3 class="card-title text-white">Ubah Status Pengguna</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
        <div class="card-body">
            <div class="form-group">
            <label for="exampleInputEmail1">Passmail</label>
            <input type="Text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Passmail" value="{{ $users->email }}" >
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Nama</label>
            <input type="Text" class="form-control" id="exampleInputPassword1" placeholder="Masukan Nama" value="{{ $users->name }}">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control">
                <option >Admin</option>
                <option selected>User</option>
                </select>
            </div>

            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Saya Yakin Dengan Pilihan Saya</label>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Ubah</button>
            <button type="submit" class="btn btn-danger ml-2">Hapus</button>
            
        </div>
        </form>
    </div>
</section>


  @endsection
