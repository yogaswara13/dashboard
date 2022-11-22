@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('menu', 'dashboard Program Studi')
@section('content')

{{-- ======================header========================= --}}
    <Section class="content-header">
        <div class="content-header">
        <div class="container-fluid">
         <h1>Dashboard Program Studi <b>{{ $detail_prodi->nama }} ( Akreditasi {{ $detail_prodi->stat_prodi }} ) </b> </h1>
        </div><!-- /.container-fluid -->
        </div>
    </section>
{{-- =======================content======================= --}}
  <section class="content">
    <div class="row">
          <div class="col-12 px-3">
            <div class="card text-center">
              <div class="card-header bg-orange ">
                    <h4 class="card-title text-white">Data Program Studi {!! $detail_prodi->prodi !!}</h4>
                    <div class="card-tools text-white">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus text-white"></i>
                      </button>
                    </div>
              </div>
            {{--=============================================Main Content ================================================  --}}

              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <div class="small-box bg-info">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>{{ $jml_mahasiswa }}</h3>

                            <p>Mahasiswa</p>
                          </div>
                          <span class="icon">
                            <i class="fas fa-male mr-5 " style="font-size : 85px"></i>
                            <i class="fas fa-female " style="font-size : 85px"></i>
                          </span>
                        </div>
                      </div>

                      <a href="{{ route('detailJurusan.detailData.mahasiswa', ['id' => app('request')->input('id'), 'kode' => app('request')->input('kode')]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->


                  <div class="col-md-4">
                    <div class="small-box bg-info">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3> {{ $jml_dosen }} </h3>

                            <p>DOSEN</p>
                          </div>
                            <span class="icon">
                              <i class="fas fa-chalkboard-teacher" style="font-size: 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{ route('detailJurusan.detailData.dosen', ['id' => app('request')->input('id'), 'kode' => app('request')->input('kode')]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="small-box bg-info">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3> {{ $jml_alumni }} </h3>

                            <p>ALUMNI</p>
                          </div>
                            <span class="icon">
                              <i class="fas fa-user-graduate" style="font-size: 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{ route('detailJurusan.detailData.alumni', ['id' => app('request')->input('id'), 'kode' => app('request')->input('kode')]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->


                  <div class="col-md-4">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>{{ $jml_dpp }}</h3>

                            <p>DPP Mahasiswa</p>
                          </div>
                            <div class="icon">
                              <i class="fas fa-male " style="font-size : 85px"></i>
                            </div>
                          </div>
                        </div>

                      <a href="{{ route('detailJurusan.detailData.dpp', ['id' => app('request')->input('id'), 'kode' => app('request')->input('kode')]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->


                  <div class="col-md-4">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                                <h3>{{ number_format((float)$avg_ipk, 2, '.', '') }}</h3>

                            <p>Rata Rata IPK</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-female " style="font-size : 85px"></i>
                          </div>
                        </div>
                      </div>
                      <a href="#" class="small-box-footer"> <br></a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>{{ $ams_mhs }}</h3>

                            <p>Akhir Masa Studi</p>
                          </div>
                            <span class="icon">
                              <i class="far fa-id-card" style="font-size : 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{ route('detailJurusan.detailData.ams', ['id' => app('request')->input('id'), 'kode' => app('request')->input('kode')]) }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                </div>
                </div>
            </div>
        </div>
      </div>
          </Section>


@endsection
