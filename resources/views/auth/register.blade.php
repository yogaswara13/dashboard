@extends('templates.auth')
@section('title', 'Login')
@section('content')

<div class="card card-orange card-outline">
<div class="login-box">
    <div class="login-logo pt-4">
        <img src="{{asset('assets/img/LogoUnpas.png')}}" class ="img-fluid" width="120px">
    </div>
    <p class="text-center login-logo p-2">Registrasi Akun Dashboard Fakultas Teknik Unpas </p>
    <!-- /.login-logo -->
      <div class="card-body login-card-body ">
  
        <form action="{{ route('postRegister') }}" method="post">
          @csrf
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Daftar</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  
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