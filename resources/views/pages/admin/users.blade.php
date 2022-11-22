@extends('templates.dashboard')
@section('title', 'Report')
@section('menu', 'Kelola User')
@section('content')

{{--===================== header ==========================--}}
    <section class="content-header">
          <div class="container-fluid">
                <h1> Kelola Pengguna </h1>
          </div><!-- akhir container-fluid -->
    </section>
    {{-- akhir content header --}}
{{--===================== main content ==========================--}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-orange">
                            <h3 class="card-title text-white">Daftar Pengguna Dashboard</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div> {{-- akhir card header  --}}
                        <div class="card-body">
                            {{-- @if ($users->isEmpty())
                            <div class="row justify-content-center align-items-center">
                                <div class="col-6">
                                    <h1 class="display-4 text-center">Belum ada Data</h1>
                                    <div class="row justify-content-center">
                                        <img src="{{ asset('assets/img/not_found.png') }}" width="120px" class="img-fluid " alt="">
                                    </div>

                                </div>
                            </div>

                            @else --}}
                            <table id="users" class="table table-bordered table-striped projects">
                                <thead class="text-center">
                                      <tr>
                                        {{-- <th style="width: 20%">
                                            Foto
                                        </th> --}}
                                        <th style="width: 30%">
                                            Pengguna
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Status Aktif?
                                        </th>
                                        <th style="width: 10%" class="text-center">
                                            Terakhir Login
                                        </th>
                                        <th style="width: 20%">
                                            Status Hak Akses
                                        </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach ($users as $item)
                                        <td>{!! $item->pengguna !!}</td>
                                        <td class="text-center">
                                            {!! $item->id_aktif == "Y" ?
                                                '<i class="fas fa-check-circle text-success"></i>' :
                                                '<i class="fas fa-times-circle text-danger"></i>'
                                            !!}
                                        </td>
                                        <td class="text-center">{{$item->akses_terakhir}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-info" disabled>Admin</button>
                                        </td>
                                    @endforeach
                                  </tbody>
                              </table>
                            {{-- @endif --}}

                            {{-- <div>
                                <button class="btn btn-sm btn-primary mt-5 float-right">Tambah Pengguna</button>
                            </div> --}}
                        </div>

                    </div>
                </div>
                {{-- akhir col --}}
            </div>
            {{-- akhir row --}}
        </div>
        {{-- akhir containter fluid --}}
    </section>



      @endsection

      {{-- @push('scripts')
          <script>
            Toast.fire({
                icon: 'success',
                title: 'Data Konten berhasil ditambahkan !'
            })
          </script>
      @endpush --}}
