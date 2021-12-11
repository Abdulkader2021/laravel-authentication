@extends('templates.main')
@section('content')
    <div class="card login-card p-0">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="{{ asset('storage/assets/images/login.jpg') }}" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
                <div class="card-body">

                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                        @endforeach
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="brand-wrapper">
                        <img src="{{ asset('storage/assets/images/logo.svg') }}" alt="logo" class="logo">
                    </div>

                    <p class="login-card-description">Sign into your account</p>


                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email address">
                        </div>

                        @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <div class="form-group mb-4">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                                   required autocomplete="new-password" placeholder="Password">
                        </div>

                        @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <input id="register" class="btn btn-block login-btn mb-4" type="submit" value="Log In">
                    </form>

                    <a href="{{ url('/forgot-password') }}" class="forgot-password-link">Forgot password?</a>
                    <p class="login-card-footer-text">Don't have an account? <a href="{{ route('register') }}" class="text-reset">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
