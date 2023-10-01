@extends('layouts.app')
@section('site_title', 'Confirm Password')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <form class="card w-90  p-4" method="POST" action="{{ route('password.confirm') }}">
                    @csrf
                    <div class="card-body">
                        <h4>Confirm Password</h4>
                        <p>This is a secure area of the application. Please confirm your password before continuing.</p>
                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <input name="password" id="password" placeholder="Password" class="form-control mb-2"
                            type="password" />
                        <button class="btn w-100 bg-gradient-primary" type="submit">Email Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
