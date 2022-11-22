    @extends('templates.auth')
    @section('title', 'Login')
    @section('content')



    <div class="card card-orange card-outline" style="margin-top : 150px;">
        <p class="text-center login-logo mb-0"> Login Dashboard</p>
    <div class="row px-3">
        <div class="col-md-6">
            <div class="login-logo pt-2">
            <img src="{{asset('assets/img/LogoUnpas.png')}}" class ="img-fluid" width="120px">
            </div>
            <p class="text-center login-logo mx-5">Fakultas Teknik Unpas </p>
            <!-- /.login-logo -->
        </div>
        <div class="col-md-6 mt-4">

            <div class="card-body login-card-body ">
                {{-- {{session()}} --}}

            <form action="{{ route('postLogin') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                <input type="text" class="form-control @error('username')
                    is-invalid
                @enderror" placeholder="Username" name="username" autofocus value="{{ old('username') }}">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope @error('username')
                    text-danger
                @enderror"></span>
                    </div>
                </div>
                </div>
                @error('username')
                    <span class="text-danger small">{{$message}}</span>
                @enderror
                <div class="input-group mb-3">
                <input type="password" class="form-control @error('password')
                    is-invalid
                @enderror" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock @error('password')
                        text-danger
                    @enderror"></span>
                    </div>
                </div>
                </div>
                @error('password')
                    <span class="text-danger small">{{$message}}</span>
                @enderror
                <div class="row">
                <!-- /.col -->
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block">LogIn</button>
                </div>
                <!-- /.col -->
                </div>
            </form>
            </div>
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
