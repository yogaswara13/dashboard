@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('menu', 'dashboard Program Studi')
@section('content')

{{-- ======================header========================= --}}
    <Section class="content-header">
        <div class="content-header">
        <div class="container-fluid">
         <h1>Dashboard Program Studi {{ $nama_prodi }} ( Akreditasi A ) </h1>
        </div><!-- /.container-fluid -->
        </div>
    </section>
{{-- =======================content======================= --}}
  <section class="content">
    <div class="row">
          <div class="col-12 px-3">
            <div class="card text-center">
              <div class="card-header bg-orange ">
                    <h4 class="card-title text-white">Data Program Studi {{ $nama_prodi }}</h4>
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
                            <h3>150</h3>
        
                            <p>Mahasiswa</p>
                          </div>
                          <span class="icon">
                            <i class="fas fa-male mr-5 " style="font-size : 85px"></i>
                            <i class="fas fa-female " style="font-size : 85px"></i>
                          </span>
                        </div>
                      </div>
                        
                      <a href="{{URL::to('/detail-jurusan?id=30')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->

                  
                  <div class="col-md-4">
                    <div class="small-box bg-info">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
            
                            <p>DOSEN</p>
                          </div>
                            <span class="icon">
                              <i class="fas fa-chalkboard-teacher" style="font-size: 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{URL::to('/detail-jurusan?id=10')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="small-box bg-info">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
            
                            <p>ALUMNI</p>
                          </div>
                            <span class="icon">
                              <i class="fas fa-user-graduate" style="font-size: 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{URL::to('/detail-jurusan?id=42')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->


                  <div class="col-md-4">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
        
                            <p>WISUDAWAN</p>
                          </div>
                            <div class="icon">
                              <i class="fas fa-male " style="font-size : 85px"></i>
                            </div>
                          </div>
                        </div>
                        
                      <a href="{{URL::to('/detail-jurusan?id=40')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->

                  
                  <div class="col-md-4">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
            
                            <p>WISUDAWATI</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-female " style="font-size : 85px"></i>
                          </div>
                        </div>
                      </div>
                      <a href="{{URL::to('/detail-jurusan?id=41')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
            
                            <p>RATA RATA IPK</p>
                          </div>
                            <span class="icon"> 
                              <i class="far fa-id-card" style="font-size : 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{URL::to('/detail-jurusan?id=43')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
        
                            <p>Akhir Masa Studi</p>
                          </div>
                            <div class="icon">
                              <i class="fas fa-exclamation-circle"  style="font-size : 85px"></i>
                            </div>
                          </div>
                        </div>
                        
                      <a href="{{URL::to('/detail-jurusan?id=44')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->

                  
                  <div class="col-md-4">
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
            
                            <p>Rata Rata Masa Studi</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-clock" style="font-size : 85px"></i>
                          </div>
                        </div>
                      </div>
                      <a href="{{URL::to('/detail-jurusan?id=45')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <div class="row">
                          <div class="col-md-6">
                            <h3>150</h3>
            
                            <p>Raihan DPP</p>
                          </div>
                            <span class="icon"> 
                              <i class="fas fa-file-invoice-dollar" style="font-size : 85px"></i>
                            </span>
                        </div>
                      </div>
                      <a href="{{URL::to('/detail-jurusan?id=46')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- /.col -->               
                </div>
                </div>
            </div>
        </div>
      </div>
          </Section>


@endsection