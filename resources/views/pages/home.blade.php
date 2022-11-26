@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('content')

{{-- ========================================= Ft Unpas Dalam Angka ================================================= --}}
  {{-- ======================================= Header ================= --}}
    <section class="content-header">
      <div class="content-header">
        <div class="container-fluid">
            <h1>Dashboard Fakultas Teknik UNPAS</h1>
        </div><!-- /.container-fluid -->
      </div>
    </section>

  {{-- ======================================== Main Content =============== --}}
    <section class="content" id="ftDalamAngka">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-orange">
                <h4 class="card-title text-white">Fakultas Teknik Unpas Dalam Angka</h4>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus text-white"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                      <div class="card-header">
                        <h3 class="card-title">Mahasiswa</h3>
                          <div class="card-tools">
                            <a href="{{ route('detailFakultas.detailMahasiswa') }}" class="btn btn-primary "><b>Detail</b></a>
                          </div>
                      </div>
                      <div class="card-body">
                        <div class="row justify-content-center">
                          <div class="col-md-6 mt-4">
                            <h3>{{$jml_mahasiswa}}</h3>
                            <h4> Mahasiswa</h4>
                          </div>
                          <span class="icon mt-3 mb-3">
                            <i class="fas fa-male" style="font-size : 100px"></i>
                            <i class="fas fa-female" style="font-size : 100px"></i>
                          </span>
                        </div>
                      </div>
                      <div class="card-footer">
                        {{-- @empty($mahasiswa)
                            <p class="card-text">Tidak ada data</p>
                        @endempty --}}
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                      <div class="card-header">
                        <h3 class="card-title">Dosen</h3>
                        <div class="card-tools">
                          <a href="{{ route('detailFakultas.detailDosen') }}" class="btn btn-primary btn-block "><b>Detail</b></a>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="row justify-content-center">
                          <div class="col-md-6 mt-4">
                            <h3>{{$jml_dosen}}</h3>
                            <h4>Pengajar</h4>
                          </div>
                          <i class="fas fa-chalkboard-teacher mt-3 mb-3" style="font-size: 100px"></i>
                        </div>
                      </div>
                      <div class="card-footer">
                        {{-- @forelse ($dosen as $item)
                            <P class="card-text">Data diatas merupakan data berdasarkan tahun {{ date('Y', strtotime($dosen->last()->updated_at)) }}</P>
                        @empty
                            <p class="card-text">Tidak ada data</p>
                        @endforelse --}}
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                      <div class="card-header">
                          <h3 class="card-title">Alumni</h3>
                          <div class="card-tools">
                             <a href="{{ route('detailFakultas.detailAlumni') }}" class="btn btn-primary btn-block "><b>Detail</b></a>
                          </div>
                      </div>
                            <!-- /.card-header -->
                      <div class="card-body">
                        <div class="row justify-content-center">
                          <div class="col-md-6 mt-4">
                            <h3>{{$jml_alumni}}</h3>
                            <h4>Alumni</h4>
                          </div>
                          <i class="far fa-id-card mt-3 mb-3" style="font-size: 100px"></i>
                        </div>
                      </div>
                            <!-- /.card-body -->
                      <div class="card-footer">
                        {{-- @forelse ($wisuda as $item)
                            <P class="card-text">Data diatas merupakan data berdasarkan tahun {{ date('Y', strtotime($wisuda->last()->updated_at)) }}</P>
                        @empty
                        <p class="card-text">Tidak ada data</p>
                        @endforelse --}}
                      </div>
                            <!-- /.card-footer-->
                    </div>
                  </div>

                   {{-- <div class="col-md-4">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                      <div class="card-header">
                        <h3 class="card-title">Staf Fakultas</h3>
                          <div class="card-tools">
                            <a href="{{URL::to('/detail-fakultas?id=20')}}" class="btn btn-primary btn-block "><b>Detail</b></a>
                          </div>
                      </div>
                      <div class="card-body">
                        <div class="text-center p-2">
                          <i class="fas fa-user-friends " style="font-size : 100px"></i>
                          <h4 class="mt-3" >{{$staf}}</h4>
                        </div>
                      </div>
                      <div class="card-footer">
                        <P class="card-text">Data diatas merupakan data berdasarkan tahun 2021</P>
                      </div>
                    </div>
                  </div>  --}}
                  <!-- /.col -->
                  {{-- {<div class="col-md-4">
                    <div class="card card-primary card-outline direct-chat direct-chat-primary">
                      <div class="card-header">
                          <h3 class="card-title">Wisudawan</h3>
                          <div class="card-tools">
                            <a href="{{URL::to('/detail-fakultas?id=40')}}" class="btn btn-primary btn-block "><b>Detail</b></a>
                          </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <div class="text-center p-2">
                          <i class="fas fa-male " style="font-size : 100px"></i>
                          <h4 class="mt-3" >{{$wisudawan}}</h4>
                        </div>
                      </div>
                            <!-- /.card-body -->
                      <div class="card-footer">
                        <P class="card-text">Data diatas merupakan data berdasarkan tahun 2021</P>
                      </div>
                            <!-- /.card-footer-->
                    </div>
                  </div>  --}}
                  <!-- /.col -->
                   {{-- <div class="col-md-4">
                      <div class="card card-primary card-outline direct-chat direct-chat-primary">
                        <div class="card-header">
                          <h3 class="card-title">Wisudawati</h3>
                            <div class="card-tools">
                              <a href="{{URL::to('/detail-fakultas?id=41')}}" class="btn btn-primary btn-block "><b>Detail</b></a>
                            </div>
                        </div>
                            <!-- /.card-header -->
                          <div class="card-body">
                              <div class="text-center p-2">
                                <i class="fas fa-female" style="font-size: 100px"></i>
                                <h4 class="mt-3" >{{$wisudawati}}</h4>
                              </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <P class="card-text">Data diatas merupakan data berdasarkan tahun 2021</P>
                            </div>
                            <!-- /.card-footer-->
                          </div>
                          <!--/.direct-chat -->
                  </div> --}}
                  <!-- /.col -->
                  <!-- /.col -->
                </div>
                      <!-- /.content-wrapper -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
{{-- ========================================= Jurusan FT Unpas Dalam Angka ========================================= --}}
  <Section class="content" id="prodiDalamAngka">
    <div class="row justify-content-center">
        <div class="col-12 px-3">
          <div class="card collapsed-card">
            <div class="card-header bg-orange">
                  <h4 class="card-title text-white">Program Studi FT Unpas Dalam Angka</h4>
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus text-white"></i>
                    </button>
              </div>
            </div>

            <div class="card-body">
              <div class="row">

                  @foreach ($prodi as $item)
                  <div class="col-md-4">
                      <div class="card
                          @if ($item->kode == "301")
                              card-orange
                          @elseif ($item->kode == "302")
                              card-primary
                          @elseif ($item->kode == "303")
                              card-info
                          @elseif ($item->kode == "304")
                              card-success
                          @elseif ($item->kode == "305")
                              card-olive
                          @elseif ($item->kode == "306")
                              card-maroon
                          @endif
                      ">
                      <div class="card-header text-white">
                        <h3 class="card-title ">{!! $item->prodi !!}</h3>
                      </div>
                      <div class="card-body">
                        <div class="row ">
                          <div class="col">
                            <div class="card card-primary card-outline">
                              <div class="card-body box-profile">
                                <div class="text-center">
                                  <img class=" img-fluid img-circle"
                                      @if ($item->kode == "301")
                                          src="{{asset('assets/img/industri.png')}}"
                                      @elseif ($item->kode == "302")
                                          src="{{asset('assets/img/Pangan.png')}}"
                                      @elseif ($item->kode == "303")
                                          src="{{asset('assets/img/mesin.png')}}"
                                      @elseif ($item->kode == "304")
                                          src="{{asset('assets/img/iF.png')}}"
                                      @elseif ($item->kode == "305")
                                          src="{{asset('assets/img/lingkungan.png')}}"
                                      @elseif ($item->kode == "306")
                                          src="{{asset('assets/img/PWK.png')}}"
                                      @endif
                                      alt="Logo Program Studi" width="100px">
                                </div>

                                <h3 class="profile-username text-center">{{$item->nama }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                  <li class="list-group-item border-0  d-flex justify-content-between align-items-center">
                                    <b class="text-muted">Akreditasi</b> <a class="float-right text-muted">{{$item->stat_prodi}}</a>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center border-top">
                                    <b>Mahasiswa</b>
                                    <a class="float-right">{{ $item->total_mhs }}</a>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Dosen</b> <a class="float-right">{{ $item->total_dosen }}</a>
                                  </li>
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <b>Alumni</b> <a class="float-right">{{$item->total_alumni }}</a>
                                  </li>
                                </ul>

                                <a href="{{ route('detailJurusan.detailProdi', ['id' => $item->kode_hash , 'kode' => $item->kode]) }}" class="btn btn-primary btn-block"><b>Detail</b></a>
                              </div>
                              <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                            {{-- ================================================================================= --}}
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>

                  @endforeach

                <!-- /.col -->
              </div>

              </div>
          </div>
        </div>
    </div>
  </Section>
{{-- ========================================= Statistik FT UNPAS  ================================================= --}}
  {{-- <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-orange collapsed-card">
              <div class="card-header">
                <h3 class="card-title text-white">Data Statistik 7 tahun terkahir (ditampilkan Ketika User sudah Login)</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                    <i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="form-group">
                    <label for="inputStatus">Data yang Ditampilkan</label>
                    <select id="inputStatus" class="form-control custom-select">
                      <option disabled>Pilih satu</option>
                      <option selected>Mahasiswa</option>
                      <option>Staf Pengajar (dosen)</option>
                      <option>Staf Fakultas</option>
                      <option>Wisudawan</option>
                      <option>Wisudawati</option>
                      <option>Alumni</option>
                    </select>
                </div>
                <div class="row">
                  <div class="col-lg-6 ">
                        <div class="card bg-white">
                          <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                              <h3 class="card-title">Statistik Mahasiswa</h3>
                               
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="d-flex">
                              <p class="d-flex flex-column">
                                <span class="text-bold text-lg">820</span>
                                <span>Visitors Over Time</span>
                              </p>
                              <p class="ml-auto d-flex flex-column text-right">
                                <span class="text-success">
                                  <i class="fas fa-arrow-up"></i> 12.5%
                                </span>
                                <span class="text-muted">Since last week</span>
                              </p>
                            </div>
                            <!-- /.d-flex -->

                            <div class="position-relative mb-4">
                              <canvas id="visitors-chart" height="200"></canvas>
                            </div>

                            <div class="d-flex flex-row justify-content-end">
                              <span class="mr-2">
                                <i class="fas fa-square text-primary"></i> This Week
                              </span>

                              <span>
                                <i class="fas fa-square text-gray"></i> Last Week
                              </span>
                            </div>
                          </div>
                        </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="card bg-white">
                      <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                          <h3 class="card-title">Statistik Dosen</h3>
                           
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="d-flex">
                          <p class="d-flex flex-column">
                            <span class="text-bold text-lg">$18,230.00</span>
                            <span>Sales Over Time</span>
                          </p>
                          <p class="ml-auto d-flex flex-column text-right">
                            <span class="text-success">
                              <i class="fas fa-arrow-up"></i> 33.1%
                            </span>
                            <span class="text-muted">Since last month</span>
                          </p>
                        </div>
                        <!-- /.d-flex -->

                        <div class="position-relative mb-4">
                          <canvas id="sales-chart" height="200"></canvas>
                        </div>

                        <div class="d-flex flex-row justify-content-end">
                          <span class="mr-2">
                            <i class="fas fa-square text-primary"></i> This year
                          </span>

                          <span>
                            <i class="fas fa-square text-gray"></i> Last year
                          </span>
                        </div>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
  </section>           --}}
@endsection

@push('scripts')
  @if (session()->has('success'))
  <script>
      Toast.fire({
          icon: 'success',
          title: '{{session()->get('success')}}'
      })
  </script>
  @elseif(session()->has('error'))
  <script>
      Toast.fire({
          icon: 'error',
          title: '{{session()->get('error')}}'
      })
  </script>
  @endif
@endpush
