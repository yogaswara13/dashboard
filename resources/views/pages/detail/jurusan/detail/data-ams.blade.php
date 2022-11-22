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
                    <h3 class="card-title text-white">Data Statistik Akhir Masa Studi</h3>
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
                                <h3 class="card-title">Statistik Mahasiswa AMS - {!! $detail_prodi->fakultas." ". $detail_prodi->prodi !!}</h3>
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
                        <th>Nama Mahasiswa</th>
                        <th>Tanggal Masuk</th>
                        <th>Tanggal Keluar/Lulus</th>
                        <th>Mulai Semester (Angkatan)</th>
                        <th>Jenis Kelamin</th>
                        <th>Email</th>
                        <th>Kewarganegaraan</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach ($data_mhs_ams as $item)
                          <tr>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->tgl_create }}</td>
                            <td>{{ $item->tgl_keluar }}</td>
                            <td>{{ $item->mulai_smt }}</td>
                            <td>{{ $item->id_jenis_kelamin }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->kewarganegaraan }}</td>
                          </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                        <tr>
                            <th>NPM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar/Lulus</th>
                            <th>Mulai Semester (Angkatan)</th>
                            <th>Jenis Kelamin</th>
                            <th>Email</th>
                            <th>Kewarganegaraan</th>
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
          labels: ["Jumlah Mahasiswa Akhir Masa Studi"],
          datasets: [
            @foreach ($data_ams_by_kelamin as $val )
                {
                    label: "Jumlah Mahasiswa {{$val['jenis_kelamin']}}",
                    backgroundColor: "{{$val['color_code']}}",
                    borderColor: "{{$val['color_code']}}",
                    fill:false,
                    data: [
                        "{{$val['total_data']}}"
                    ]
                },
            @endforeach
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
