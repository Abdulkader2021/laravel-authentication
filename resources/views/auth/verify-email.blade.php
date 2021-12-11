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

                    <p class="login-card-description">Verify Your Email Address!</p>

                    @if (session('status') == 'verification-link-sent')
                        <div class="alert alert-success">
                            A new email verification link has been emailed to you!
                        </div>
                    @endif

                    <p class="card-text mb-2">
                        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we
                        just emailed to you? If you didn\'t receive the email, we will gladly send you another.
                    </p>


                    <div class="mt-5 d-flex justify-content-between">

                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf

                            <input id="verified" class="btn btn-block login-btn mb-4" type="submit" value="Click here to request another">
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <input id="logout" class="btn btn-danger logout-btn mb-4" type="submit" value="Logout">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
