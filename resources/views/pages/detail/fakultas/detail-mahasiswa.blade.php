@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('menu', 'Detai Fakultas')
@section('content')

{{-- ==================================== Header ============================================ --}}
    <section class="content-header">
        <div class="content-header">
        <div class="container-fluid">
            <h1> Detail Data Fakultas Teknik UNPAS </h1>
        </div><!-- /.container-fluid -->
        </div>
    </section>
{{-- ================================== main content ======================================--}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="card card-orange">
                  <div class="card-header">
                    <h3 class="card-title text-white">Data Statistik 7 Angkatan Aktif</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">

                    <div class="row">
                      <div class="col-lg-12 ">
                        <div class="card bg-white">
                            <div class="card-header border-0">
                              <div class="d-flex justify-content-between">
                                <h3 class="card-title">Statistik Mahasiswa</h3>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="d-flex">
                                <p class="d-flex flex-column">
                                  <span class="text-bold text-lg"> </span>
                                  <span>Jumlah Mahasiswa</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                </p>
                              </div>
                              <!-- /.d-flex -->

                              <div class="position-relative mb-4">
                                <canvas id="data-chart" height="200"></canvas>
                              </div>

                              <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                  <i class="fas fa-square text-primary" style="color: #FD7E14"></i> Jumlah Total Mahasiswa
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-square" style="color: #3b8bba"></i> Jumlah Mahasiswa
                                  </span>
                                  <span class="mr-2">
                                    <i class="fas fa-square" style="color: #D81B60"></i> Jumlah Mahasiswi
                                  </span>
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>

                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                  <div class="card-header bg-orange">
                    <h3 class="card-title text-white">Data Table Mahasiswa</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>Program Studi</th>
                        <th>Mahasiswa</th>
                        <th>Mahasiswa Pria</th>
                        <th>Mahasiswa Wanita</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($mahasiswa['prodi'] as $item)
                          <tr>
                            @if ($item['prodi'] == "301")
                                <td>S1 - Teknik Industri</td>
                            @elseif ($item['prodi'] == "302")
                                <td>S1 - Teknologi Pangan</td>
                            @elseif ($item['prodi'] == "303")
                                <td>S1 - Teknik Mesin</td>
                            @elseif ($item['prodi'] == "304")
                                <td>S1 - Teknik Informatika</td>
                            @elseif ($item['prodi'] == "305")
                                <td>S1 - Teknik Lingkungan</td>
                            @elseif ($item['prodi'] == "306")
                                <td>S1 - Teknik Perencanaan Wilayah & Tata Kota</td>
                            @endif
                            <td>{{ $item['jumlah'] }}</td>
                            <td>{{ $item['jumlah_pria'] }}</td>
                            <td>{{ $item['jumlah_wanita'] }}</td>
                          </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Program Studi</th>
                        <th>Mahasiswa</th>
                        <th>Mahasiswa Pria</th>
                        <th>Mahasiswa Wanita</th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
          </div>
    </section>



@endsection

@push('scripts')
    <script>
      $(function () {
        'use strict'

        var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
        }

        var mode = 'index'
        var intersect = true

        var $salesChart = $('#data-chart')
        // eslint-disable-next-line no-unused-vars
        var salesChart = new Chart($salesChart, {
            type: 'bar',
            data: {
            labels: [
                @foreach ($mahasiswa['mhs_aktif'] as $item)
                    "Angkatan {{$item['angkatan']}}",
                @endforeach
            ],
            datasets: [
            {
                label: 'Jumlah Total Mahasiswa',
                data: [@foreach ($mahasiswa['mhs_aktif'] as $item) {{$item['jumlah']}}, @endforeach ],
                borderColor: "#FD7E14",
                backgroundColor: "#FD7E14",
                fill: false
            },
            {
                label: 'Jumlah Mahasiswa',
                data: [@foreach ($mahasiswa['mhs_aktif'] as $item) {{$item['jml_mhs_pria']}}, @endforeach],
                borderColor: "#3b8bba",
                backgroundColor: "#3b8bba",
                fill: false
            },
            {
                label: 'Jumlah Mahasiswi',
                data: [@foreach ($mahasiswa['mhs_aktif'] as $item) {{$item['jml_mhs_wanita']}}, @endforeach],
                borderColor: "#D81B60",
                backgroundColor: "#D81B60",
                fill: false
            }

          ]
        },
        options: {
          maintainAspectRatio: false,
          tooltips: {
            mode: mode,
            intersect: intersect
          },
          hover: {
            mode: mode,
            intersect: intersect
          },
          legend: {
            display: false
          },
          scales: {
            yAxes: [{
              // display: false,
              gridLines: {
                display: true,
                lineWidth: '4px',
                color: 'rgba(0, 0, 0, .2)',
                zeroLineColor: 'transparent'
              },
              ticks: $.extend({
                beginAtZero: true,

                // Include a dollar sign in the ticks
                callback: function (value) {
                  if (value >= 1000) {
                    value /= 1000
                    value += 'k'
                  }

                  return  value
                }
              }, ticksStyle)
            }],
            xAxes: [{
              display: true,
              gridLines: {
                display: false
              },
              ticks: ticksStyle
            }]
          }
        }
      })

})

    </script>
@endpush

