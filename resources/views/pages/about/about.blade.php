@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('content')

{{-- ==================================== Header ============================================ --}}
    <section class="content-header">
      <div class="content-header">
        <div class="container-fluid">
          <h1 >Tentang Fakultas Teknik Universitas Pasundan </h1>
        </div><!-- /.container-fluid -->
      </div>
    </section>  
{{-- ================================== main content ======================================--}}
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="rounded mx-auto w-50  h-50 d-block "
                     src="{{asset('assets/img/LogoUnpas.png')}}"
                     alt="User profile picture">
              </div>
              <h5 class=" text-center mt-3 mb-3">Fakultas Teknik Universitas Pasundan</h5>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Akreditasi</b> <a class="float-right">A</a>
                </li>
                <li class="list-group-item">
                  <b>Mahasiswa</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Pegawai</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Alumni</b> <a class="float-right">13,287</a>
                </li>
              </ul>
              <strong><i class="fas fa-landmark mr-1"></i> Bidang Bisnis</strong>
              <p class="text-muted">
               Bidang Pendidikan
              </p>

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

              <p class="text-muted">Jl. Dr. Setiabudi No.193, 
                Gegerkalong, Kec. Sukasari,    
                Kota  Bandung, Jawa Barat 40153</p>

              <hr>

              <strong><i class="fas fa-phone-alt mr-1"></i> Kontak</strong>

              <p class="text-muted">Fax : 022 - 2019329</p>
              <p class="text-muted ">Phone : 022 - 2019435</p>
              <hr>

              <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

              <p class="text-muted">info_ftunpas@unpas.ac.id</p>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      {{--===============================================Detail FT UNPAS ========================================  --}}
         
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#strukturorganisasi" data-toggle="tab">Struktur Organisasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#visimisi" data-toggle="tab">Visi & Misi</a></li>
                <li class="nav-item"><a class="nav-link" href="#tujuan" data-toggle="tab">Tujuan</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="strukturorganisasi">
                  <!-- Post -->
                  <div class="strukturOrganisasi">
                    <div class="text-center" >
                      <h4>
                          <p class="badge bg-info text-wrap p-2" style="width: 450px;">
                            Struktur Organisasi Fakultas Teknik UNPAS
                          </p> 
                      </h4>
                    </div>
                    <div>
                      <img class="img-fluid bg-white" src="{{asset('assets/img/struktur-organisasi.png')}}" alt="struktur organisasi">
                    </div>
                  </div>
                  <!-- /.post -->


                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="visimisi">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->

                    <div class="time-label">
                      <i class="far fa-lightbulb bg-warning"></i>
                      <div class="text-center" >
                        <h4>
                            <p class="badge bg-info text-wrap p-2" style="width: 450px;">
                              Visi & Misi Fakultas Teknik Universitas Pasundan
                            </p> 
                        </h4>
                      </div>
                    </div>                       
                    
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-globe bg-green"></i>

                      <div class="timeline-item">
                        <h3 class="timeline-header "><a href="#">Visi </a></h3>

                        <div class="timeline-body">
                          Menjadi penyelenggara pendidikan tinggi teknik terkemuka menuju komunitas akademik peringkat internasional yang mengusung nilai Kesundaan dan Keislaman di tahun 2021
                        </div>

                      </div>
                    </div>
                    <!-- END timeline item -->

                    <!-- timeline item -->
                    <div>
                      <i class="fas fa-cogs bg-navy"></i>

                      <div class="timeline-item">
                        <h3 class="timeline-header "><a href="#">Misi</a></h3>

                        <div class="timeline-body">
                          Menyelenggrakan pendidikan tinggi teknik yang berkualitas dalam melaksanakan Tridharma Perguruan Tinggi, berkontribusi dalam pembangunan, serta mengusung nilai Kesundaan dan Keislaman.
                        </div>
                      </div>
                    </div>
                    <!-- END timeline item -->
                    <div>
                      <i class="far fa-clock bg-gray"></i>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="tujuan">
                  
                      <h4 class="text-center">
                          <p class=" badge bg-info text-wrap p-2" style="width: 450px;">
                            Tujuan Fakultas Teknik Universitas Pasundan
                          </p> 
                      </h4>
                    <div class="callout callout-info">
                      <h5>1. Menjadi Fakultas yang mandiri dan bertatakelola baik ( Good Faculty Governance).</h5>
                      <h5>2. Menghasilkan lulusan yang :
                       <h5>
                        - Bertaqwa kepada Allah SWT, berkontribusi dalam peningkatan mutu kehidupan bermasyarakat berdasrkan pancasila, menjunjung tinggi nilai kemanusiaan,memiliki kepekaan sosial terhadap masyarakat dan menunjukkan sikap bertanggungjawab terhadap terhadap pekerjaan pada bidang keahliannya secara mandiri.
                      </h5>
                      <h5>- Tanggap terhadap kemajuan ilmu dan teknologi serta dinamika perubahan sosial dan kemasyarakatan, khususnyayang berkaitan dengan bidang keahliannya.                             Menguasai dasar-dasar ilmiah serta pengetahuan dan metodologi sehingga mampu menemukan, memahami, menjelaskan dan merumuskan penyelesaian masalah yang ada di dalam kawasan keahliannya.
                      </h5>
                      
                    </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>





  @endsection