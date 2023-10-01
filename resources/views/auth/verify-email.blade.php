@extends('layouts.app')
@section('site_title', 'Verify Email')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <div class="card w-90  p-4">
                    <div class="card-body">
                        <h4>Verify Email</h4>
                        <p>Thanks for signing up! Before getting started, could you verify your email address by clicking on
                            the
                            link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                        </p>
                        @if (session('status') == 'verification-link-sent')
                            <p>A new verification link has been sent to the email address you provided during registration.
                            </p>
                        @endif
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button class="btn w-100 btn-dark" type="submit">Resend Verification Email</button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn w-100 bg-gradient-primary" type="submit">Log Out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
