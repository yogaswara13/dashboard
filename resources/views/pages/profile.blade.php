@extends('templates.dashboard')
@section('title', 'Profile')
@section('content')

    <!-- Main content -->
    <section class="content-header">
      <div class="content-header">
        <div class="container-fluid">
            <h1 >Detail Profile</h1>
        </div><!-- /.container-fluid -->
      </div>
    </section>
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{ session('users')->path_to_foto }}"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center"> {!! session('users')->pengguna !!} </h3>

                  <p class="text-muted text-center">Terakhir Login :  {{ session('users')->akses_terakhir}} </p>

                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- About Me Box -->

              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Ubah Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">

                        <div>
                          <i class="far fa-clock bg-gray"></i>
                        </div>
                      </div>
                    </div>
                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal" action="{{ route('profile.changePassword') }}" method="POST">
                        @csrf
                        {!! method_field('patch') !!}
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-4 col-form-label @error('username')
                              text-danger
                          @enderror">Username</label>
                          <div class="col-sm-8">
                            <input type="text" name="username" class="form-control @error('username')
                                is-invalid
                            @enderror" placeholder="Username" value="{{session('username')}}" readonly>
                          </div>
                          @error('username')
                          <small class="offset-sm-4 col-sm-8 text-danger">
                            {{$message}}
                          </small>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-4 col-form-label @error('old_password')
                            text-danger
                          @enderror">Password Lama</label>
                          <div class="col-sm-8">
                            <input type="password" name="old_password" class="form-control @error('old_password')
                                is-invalid
                            @enderror" placeholder="Password Lama" value="">
                          </div>
                          @error('old_password')
                          <small class="offset-sm-4 col-sm-8 text-danger">
                            {{$message}}
                          </small>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-4 col-form-label @error('new_password')
                            text-danger
                          @enderror">Password Baru</label>
                          <div class="col-sm-8">
                            <input type="password" name="new_password" class="form-control @error('new_password')
                                is-invalid
                            @enderror" placeholder="Password Lama" value="">
                          </div>
                          @error('new_password')
                          <small class="offset-sm-4 col-sm-8 text-danger">
                            {{$message}}
                          </small>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-4 col-sm-8">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" required> Saya Ingin Mengubah Data</a>
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-4 col-sm-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
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

      <!-- /.content -->
    <!-- /.content-wrapper -->
  </section>
    @endsection

    @push('scripts')
    @if ( session()->has('error') )
        <script>
            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            })
        </script>
    @elseif ( session()->has('success') )
        <script>
            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            })
        </script>
    @endif
    @endpush
