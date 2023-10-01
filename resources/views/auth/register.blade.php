@extends('layouts.app')
@section('site_title', 'Register Page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <form class="card w-90  p-4" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="card-body">
                        <h4>SIGN Up</h4>
                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <input name="username" id="username" placeholder="Username" class="form-control mb-2"
                            type="username" value="{{ old('username', $username ?? '') }}" />
                        <input name="email" id="email" placeholder="User Email" class="form-control mb-2"
                            type="email" value="{{ old('email', $email ?? '') }}" />
                        <input name="password" id="password" placeholder="Password" class="form-control mb-2"
                            type="password" />
                        <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                            class="form-control mb-2" type="password" />
                        <button class="btn w-100 bg-gradient-primary" type="submit">Register</button>
                        <hr />
                        <div class="float-end mt-3">
                            <span>
                                <a class="text-center ms-3 h6" href="{{ route('login') }}">Already registered?</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
