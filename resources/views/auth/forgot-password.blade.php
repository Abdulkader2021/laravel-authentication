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

                    <p class="login-card-description">Reset Password</p>

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

                    <form method="POST" action="{{ route('password.request') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                        </div>

                        <input id="register" class="btn btn-block login-btn mb-4" type="submit" value="Reset">
                    </form>

                    <p class="login-card-footer-text">Already have an account? <a href="{{ route('login') }}" class="text-reset">Log In</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
