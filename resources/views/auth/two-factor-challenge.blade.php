@extends('templates.main')
@section('content')
    <div class="card login-card p-0">
        <div class="row no-gutters">
            <div class="col-md-5">
                <img src="{{ asset('storage/assets/images/login.jpg') }}" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
                <div class="card-body">



                    <div class="brand-wrapper">
                        <img src="{{ asset('storage/assets/images/logo.svg') }}" alt="logo" class="logo">
                    </div>

                    <p class="login-card-description" style="font-size: 18px;">
                        Please confirm access to your account by entering the authentication
                        code provided by your authenticator application.
                    </p>

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

                    <form method="POST" action="{{ route('2fa.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="code" class="sr-only">Code</label>
                            <input type="text" inputmode="numeric" name="code" id="code" class="form-control @error('code') is-invalid @enderror"
                                   autofocus placeholder="Code">
                        </div>

                        @error('code')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <input id="code" class="btn btn-block login-btn mb-4" type="submit" value="Recovery Code">
                    </form>

                    <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input id="logout" class="btn btn-link mb-4" type="submit" value="Logout">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
