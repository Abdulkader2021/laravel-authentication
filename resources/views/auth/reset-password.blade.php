@extends('templates.main')
@section('content')
    <div class="card login-card">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="{{ asset('storage/assets/images/login.jpg') }}" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
                <div class="card-body">
                    <div class="brand-wrapper">
                        <img src="{{ asset('storage/assets/images/logo.svg') }}" alt="logo" class="logo">
                    </div>
                    <p class="login-card-description">Register a new account</p>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{request()->route('token') }}">

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" value="{{ $request->email }}">
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


                        <div class="form-group mb-4">
                            <label for="password-confirm" class="sr-only">Confirm password</label>
                            <input type="password" name="password_confirmation" id="password-confirm" class="form-control"
                                   required autocomplete="new-password" placeholder="Confirm Password">
                        </div>

                        <input id="register" class="btn btn-block login-btn mb-4" type="submit" value="Update Password">
                    </form>

                    <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}" class="text-reset">Log In</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
