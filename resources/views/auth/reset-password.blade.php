@extends('layouts.app')
@section('site_title', 'Register Page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 animated fadeIn col-lg-6 center-screen">
                <form class="card w-90  p-4" method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <div class="card-body">
                        <h4>Reset Password</h4>
                        @if (count($errors))
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endforeach
                        @endif
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <input name="email" id="email" placeholder="User Email" class="form-control mb-2"
                            type="email" value="{{ old('email', $request->email) }}" />
                        <input name="password" id="password" placeholder="Password" class="form-control mb-2"
                            type="password" />
                        <input name="password_confirmation" id="password_confirmation" placeholder="Confirm Password"
                            class="form-control mb-2" type="password" />
                        <button class="btn w-100 bg-gradient-primary" type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
