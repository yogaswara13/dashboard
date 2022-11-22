@extends('templates.dashboard')
@section('title', 'Dashboard')
@section('menu', 'Detai Fakultas')
@section('content')

{{-- ==================================== Header ============================================ --}}
    <section class="content-header">
        <div class="content-header">
        <div class="container-fluid">
            <h1> Detail Data Program Studi FT UNPAS </h1>
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
                    <h3 class="card-title text-white">Data Statistik DPP Mahasiswa</h3>
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
                                <h3 class="card-title">Statistik DPP Mahasiswa</h3>
                                 
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="d-flex">
                                <p class="d-flex flex-column">
                                  <span class="text-bold text-lg"> </span>
                                  <span>Jumlah </span>
                                </p>
                              </div>
                              <!-- /.d-flex -->

                              <div class="position-relative mb-4">
                                <canvas id="data-chart" height="200"></canvas>
                              </div>

                              <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                  <i class="fas fa-square" style="color: #fd7e14"></i> Jumlah Alumni
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
                    <h3 class="card-title text-white">Data Table </h3>
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
                        <th>NPM</th>
                        <th>Tagihan</th>
                        <th>Jumlah Bayar</th>
                        <th>Persentase %</th>
                        <th>DPPS</th>
                        <th>SKPI</th>
                        <th>Waktu Bayar</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($data_dpp as $item)
                          <tr>
                            <td>{{ $item->kode_mahasiswa }}</td>
                            <td>{{ "Rp. " . number_format($item->tagihan, 0, ',', '.') }}</td>
                            <td>{{ "Rp. " . number_format($item->bayar, 0, ',', '.') }}</td>
                            <td class="font-weight-bold {{ $item->persen == "100" ? "text-success" : "text-dark" }}">{{ $item->persen . "%" }}</td>
                            <td class="font-weight-bold {{ $item->dpps == "OK" ? "text-success" : "text-danger" }}">{{ $item->dpps }}</td>
                            <td class="font-weight-bold {{ $item->skpi == "OK" ? "text-success" : "text-danger" }}">{{ $item->skpi }}</td>
                            <td>{{ $item->waktu_bayar }}</td>
                          </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>NPM</th>
                            <th>Tagihan</th>
                            <th>Jumlah Bayar</th>
                            <th>Persentase %</th>
                            <th>DPPS</th>
                            <th>SKPI</th>
                            <th>Waktu Bayar</th>
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
            "Data Persentase DPP Mahasiswa"
        ],
          datasets: [
            {
                label: "DPP <= 25%",
                backgroundColor: '#FF6565',
                borderColor: '#FF6565',
                fill:false,
                data: [
                    {{count($dpp_25)}}
                ]
            },
            {
                label: "DPP > 25% dan <= 50%",
                backgroundColor: '#FFAA00',
                borderColor: '#FFAA00',
                fill:false,
                data: [
                    {{count($dpp_50)}}
                ]
            },
            {
                label: "DPP > 50% dan <= 75%",
                backgroundColor: '#00B1FF',
                borderColor: '#00B1FF',
                fill:false,
                data: [
                    {{count($dpp_75)}}
                ]
            },
            {
                label: "DPP 100%",
                backgroundColor: '#00BC6B',
                borderColor: '#00BC6B',
                fill:false,
                data: [
                    {{count($dpp_100)}}
                ]
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
