@extends('layouts.app')
@section('site_title', 'Login Page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <form class="card w-90  p-4" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card-body">
                        <h4>SIGN IN</h4>
                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <input name="email" id="email" placeholder="Your Email" class="form-control mb-2"
                            type="email" value="{{ old('email', $email ?? '') }}" />
                        <input name="password" id="password" placeholder="Your Password" class="form-control mb-2"
                            type="password" />
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded" name="remember">
                            <span class="">Remember me</span>
                        </label>
                        <button class="btn w-100 bg-gradient-primary" type="submit">Log in</button>
                        <hr />
                        <div class="float-end mt-3">
                            <span>
                                <a class="text-center ms-3 h6" href="{{ route('register') }}">Sign Up </a>
                                <span class="ms-1">|</span>
                                <a class="text-center ms-3 h6" href="{{ route('password.request') }}">Forget Password</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
