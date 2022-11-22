@extends('templates.dashboard')
@section('title', 'Report')
@section('content')

{{--===================== header ==========================--}}
    <section class="content-header">
          <div class="container-fluid">
                <h1> Kelola Konten </h1>
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
                            <h3 class="card-title text-white">List Konten</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse" title="Collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div> {{-- akhir card header  --}}
                        <div class="card-body">
                            @if ($users->isEmpty())
                            <div class="row justify-content-center align-items-center">
                                <div class="col-6">
                                    <h1 class="display-4 text-center">Belum ada Data</h1>
                                    <div class="row justify-content-center">
                                        <img src="{{ asset('assets/img/not_found.png') }}" width="120px" class="img-fluid " alt="">
                                    </div>

                                </div>
                            </div>

                            @else
                            <table id="users" class="table table-bordered table-striped projects">
                                <thead class="text-center">
                                      <tr>
                                           <th style="width: 20%">
                                              Nama Tabel
                                          </th>
                                          <th style="width: 20%">
                                              Nama DataBase
                                          </th>
                                          <th style="width: 20%">
                                              Nama Konten
                                          </th>
                                          <th style="width: 20%" class="text-center">
                                              Status Konten
                                          </th>
                                          <th style="width: 20%">
                                              Aksi
                                          </th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      @foreach ($users as $user)
                                      <tr>
                                        <td class="text-center">
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            <a>
                                                {{ $user->name }}
                                            </a>
                                            <br/>
                                            <small>
                                                dibuat : {{ date('d-m-Y', strtotime($user->created_at)) }}
                                            </small>
                                            <br>
                                            <small>
                                              terakhir aktif : {{ date('d-m-Y, h:m:s', strtotime($user->updated_at)) }}
                                          </small>
                                        </td>
                                        <td class="text-center">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <img alt="Avatar" class="table-avatar" src="{{asset('assets/img/LogoUnpas.png')}}">
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="text-center">
                                            @foreach ($user->user_roles as $role)
                                                <p>{{ $role->user_role }}</p>
                                            @endforeach
                                        </td>
                                        <td class="project-actions text-right">
                                            <a class="btn btn-info btn-sm" href="{{URL::to('/edit-user?id='.$user->id)}}">
                                                <i class="fas fa-pencil-alt">
                                                </i>
                                                Edit
                                            </a>
                                            <a class="btn btn-success btn-sm" href="#">
                                                <i class="fas fa-plus-square">
                                                </i>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>

                                    @endforeach
                                  </tbody>
                              </table>
                            @endif

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

@push('scripts')
<script>
    Toast.fire({
        icon: 'success',
        title: 'Data Konten berhasil ditambahkan !'
    })
  </script>
@endpush
