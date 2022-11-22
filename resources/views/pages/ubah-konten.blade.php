@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('menu', 'Ubah Konten')
@section('content')

    {{-- ==================================== Header ============================================ --}}
    <section class="content-header">
        <div class="content-header">
        <div class="container-fluid">
            <h1> Ubah Konten Dashboard </h1>
        </div><!-- /.container-fluid -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col">
              <div class="card card-warning ">
                <div class="card-header text-white">
                  <h3 class="card-title">Ubah Konten</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="inputStatus">Nama Konten</label>
                        <select id="inputStatus" class="form-control custom-select">
                          <option disabled>Pilih Satu</option>
                          <option selected>Mahasiswa</option>
                          <option>Pengajar</option>
                          <option>Wisuda</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="inputStatus">Nama Data Base</label>
                        <select id="inputStatus" class="form-control custom-select">
                          <option disabled>Pilih Satu</option>
                          <option selected>Mahasiswa</option>
                          <option>Pengajar</option>
                          <option>Wisuda</option>
                        </select>
                      </div>
                  <div class="form-group">
                    <label for="inputStatus">Status Konten</label>
                    <select id="inputStatus" class="form-control custom-select">
                      <option disabled>Pilih Satu</option>
                      <option selected>Aktif</option>
                      <option>Tidak Aktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Kategori Kontent</label>
                    <select id="inputStatus" class="form-control custom-select">
                      <option  disabled>Pilih Satu</option>
                      <option selected>Data Fakultas</option>
                      <option>Data Program Studi</option>
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
        </div>
          <div class="row">
            <div class="col-12">
              <a href="#" class="btn btn-secondary">Cancel</a>
              <input type="submit" value="Ubah Projek" class="btn btn-success float-right">
            </div>
          </div>
        </div>
    </section>

    @endsection