@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('menu', 'Tambah-Konten')
@section('content')

    {{-- ==================================== Header ============================================ --}}
    <section class="content-header">
        <div class="content-header">
        <div class="container-fluid">
            <h1> Kelola Konten </h1>
        </div><!-- /.container-fluid -->
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-header bg-orange">
                  <h3 class="card-title text-white">Tambah Konten Dashboard</h3>
    
                  <div class="card-tools ">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                      <i class="fas fa-minus text-white"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Nama Konten</label>
                    <input type="text" id="inputName" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputClientCompany">Nama Data Base</label>
                    <input type="text" id="inputClientCompany" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Status Konten</label>
                    <select id="inputStatus" class="form-control custom-select">
                      <option selected disabled>Pilih Satu</option>
                      <option>Aktif</option>
                      <option>Tidak Aktif</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="inputStatus">Kategori Kontent</label>
                    <select id="inputStatus" class="form-control custom-select">
                      <option selected disabled>Pilih Satu</option>
                      <option>Data Fakultas</option>
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
              <input type="submit" value="Tambah Projek baru" class="btn btn-success float-right">
            </div>
          </div>
        </div>
    </section>

    @endsection