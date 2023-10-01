@extends('layouts.app')
@section('site_title', 'Forgot Password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <form class="card w-90  p-4" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="card-body">
                        <h4>Forgot Password</h4>
                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a
                            password reset link that will allow you to choose a new one.</p>
                        <input name="email" id="email" placeholder="Your Email" class="form-control mb-2" type="email"
                            value="{{ old('email', $email ?? '') }}" />
                        <button class="btn w-100 bg-gradient-primary" type="submit">Email Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
