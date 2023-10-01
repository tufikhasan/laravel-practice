@extends('layouts.dashboard')
@section('site_title', 'Change Password')
@section('content')
    <div class="row">
        <div class="col-md-7 animated fadeIn col-lg-6">
            <form class="card w-90  p-4" method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div class="card-body">
                    <h4>Update Password</h4>
                    <p>Ensure your account is using a long, random password to stay secure.</p>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <input name="old_password" id="old_password" placeholder="Current password" class="form-control mb-2"
                        type="password" />
                    <input name="new_password" id="new_password" placeholder="New Password" class="form-control mb-2"
                        type="password" />
                    <input name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                        class="form-control mb-2" type="password" />
                    <button class="btn w-100 bg-gradient-primary" type="submit">Change Password</button>
                </div>
            </form>
        </div>
    </div>
@endsection
