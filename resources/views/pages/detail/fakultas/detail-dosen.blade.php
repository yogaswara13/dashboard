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
                    <h3 class="card-title text-white">Data Statistik Dosen</h3>
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
                                <h3 class="card-title">Statistik Dosen</h3>
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="d-flex">
                                <p class="d-flex flex-column">
                                  <span class="text-bold text-lg"> </span>
                                  <span>Jumlah Dosen setiap Program Studi</span>
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
                                  <i class="fas fa-square" style="color: #3b8bba"></i> Jumlah Dosen
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
                            <th>NIDN</th>
                            <th>NIRA</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Kewarganegaraan</th>
                            <th>Pangkat Golongan</th>
                            <th>Umur</th>
                            <th>Email</th>
                            <th>Aktif?</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($dosen as $item)
                          <tr>
                            <td> {{ $item->nidn }} </td>
                            <td> {{ $item->nira }} </td>
                            <td> {{ $item->nama }} </td>
                            <td> {{ $item->prodi }} </td>
                            <td> {{ $item->kewarganegaraan }} </td>
                            <td> {{ $item->id_pangkat_gol }} </td>
                            <td> {{ Carbon\Carbon::parse($item->tgl_lahir)->diff(Carbon\Carbon::now())->y }} </td>
                            <td> {{ $item->email }} </td>
                            <td> {!! $item->id_stat_aktif == 1 ?
                            '<i class="fas fa-check-circle text-success"></i>' :
                            '<i class="fas fa-times-circle text-danger"></i>' !!}
                            </td>
                      @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>NIDN</th>
                            <th>NIRA</th>
                            <th>Nama</th>
                            <th>Program Studi</th>
                            <th>Kewarganegaraan</th>
                            <th>Pangkat Golongan</th>
                            <th>Umur</th>
                            <th>Email</th>
                            <th>Aktif?</th>
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
            @foreach ($dosen->groupBy('prodi') as $k => $item)
                "{{$k}}",
            @endforeach
        ],
          datasets: [
            {
                label: "Jumlah Dosen ",
                backgroundColor: '#3b8bba',
                borderColor: '#3b8bba',
                fill:false,
                data: [
                    @foreach ($dosen->groupBy('prodi') as $key => $value)
                        {{ count($value) .","}}
                    @endforeach
                ],
            },
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


{{-- ffae00 --}}
