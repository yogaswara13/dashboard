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
                    <h3 class="card-title text-white">Data Statistik 7 tahun terkahir</h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <div class="card-body">
                    {{-- <div class="form-group">
                        <label for="inputStatus">Data yang Ditampilkan</label>
                        <select id="inputStatus" class="form-control custom-select">
                            <option disabled>Pilih satu</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $id ? 'selected' : '' }}> {{ $item->nama_data }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="row">
                      <div class="col-lg-12 ">
                        <div class="card bg-white">
                            <div class="card-header border-0">
                              <div class="d-flex justify-content-between">
                                <h3 class="card-title">Statistik {{ $namaData }}</h3>
                                 
                              </div>
                            </div>
                            <div class="card-body">
                              <div class="d-flex">
                                <p class="d-flex flex-column">
                                  <span class="text-bold text-lg">{{ $students }}</span>
                                  <span>Jumlah {{ $namaData }}</span>
                                </p>
                                <p class="ml-auto d-flex flex-column text-right">
                                  <span class="text-success">
                                    <i class="fas fa-arrow-up"></i> 33.1%
                                  </span>
                                  <span class="text-muted">Sejak Satu Tahun Terakhir</span>
                                </p>
                              </div>
                              <!-- /.d-flex -->

                              <div class="position-relative mb-4">
                                <canvas id="data-chart" height="200"></canvas>
                              </div>

                              <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                  <i class="fas fa-square text-primary"></i> Tahun Ini
                                </span>

                                <span>
                                  <i class="fas fa-square text-gray"></i> Tahun Kemarin
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
                    <h3 class="card-title text-white">Data Table {{ $namaData }}</h3>
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
                        <th>Mahasiswa Reg - pagi</th>
                        <th>Mahasiswa Reg - Siang</th>
                        <th>Tahun</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($all_data as $item)
                          <tr>
                            <td>{{ $item->nama_prodi }} ({{ $item->kode_prodi }})</td>
                            <td>{{ count($item->students) }}</td>
                            <td>{{ ceil(count($item->students)/2) }}</td>
                            <td>{{ floor(count($item->students)/2) }}</td>
                            <td>{{ date('Y', strtotime($item->students->last()->updated_at)) }}</td>
                          </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th>Program Studi</th>
                        <th>Mahasiswa</th>
                        <th>Mahasiswa Reg - Pagi</th>
                        <th>Mahasiswa Reg - Siang</th>
                        <th>Tahun</th>
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
            '{{ date("Y", strtotime("-6 year", time())) }}',
            '{{ date("Y", strtotime("-5 year", time())) }}',
            '{{ date("Y", strtotime("-4 year", time())) }}',
            '{{ date("Y", strtotime("-3 year", time())) }}',
            '{{ date("Y", strtotime("-2 year", time())) }}',
            '{{ date("Y", strtotime("-1 year", time())) }}',
            '{{ date("Y") }}'
        ],
          datasets: [
            {
              // backgroundColor: '#ffae00',
              // borderColor: '#ffae00',
              backgroundColor: '#3b8bba',
              borderColor: '#3b8bba',
              data: [1000, 2000, 3000, 2500, 2700, 2500, 3000]
            },
            {
              backgroundColor: '#ced4da',
              borderColor: '#ced4da',
              data: [700, 1700, 2700, 2000, 1800, 1500, 2000]
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
