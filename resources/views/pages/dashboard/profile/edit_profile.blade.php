@extends('layouts.dashboard')
@section('site_title', 'Edit Profile')
@section('content')
    <div class="row">
        <div class="col-md-7 animated fadeIn col-lg-6 mb-5">
            <form class="card w-90  p-4" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="card-body">
                    <h4>Profile Information</h4>
                    <p>Update your account's profile information and email address.</p>
                    @if (count($errors))
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endforeach
                    @endif
                    <img src="{{ !empty($user->image) ? url('upload/profile/' . $user->image) : url('images/default.jpg') }}"
                        alt="" class="rounded" width="120" height="auto" id="imagePreview">
                    <hr>
                    <label for="username" class="fs-6">Username</label>
                    <input name="username" id="username" placeholder="Username" class="form-control mb-2" type="text"
                        value="{{ old('username', $user->username) }}" />
                    <label for="first_name" class="fs-6">First Name</label>
                    <input name="first_name" id="first_name" placeholder="First Name" class="form-control mb-2"
                        type="text" value="{{ old('first_name', $user->first_name) }}" />
                    <label for="last_name" class="fs-6">Last Name</label>
                    <input name="last_name" id="last_name" placeholder="Last Name" class="form-control mb-2" type="text"
                        value="{{ old('last_name', $user->last_name) }}" />
                    <label for="email" class="fs-6">Email</label>
                    <input readonly name="email" id="email" placeholder="Email" class="form-control mb-2"
                        type="email" value="{{ old('email', $user->email) }}" />
                    <label for="role" class="fs-6">Role</label>
                    <input readonly id="role" name="role" class="form-control mb-2 text-capitalize" type="text"
                        value="{{ old('role', $user->role) }}" />
                    <label for="image" class="fs-6">Profile Picture</label>
                    <input name="image" id="image" placeholder="Profile Pic" class="form-control mb-2" type="file"
                        oninput="imagePreview.src=window.URL.createObjectURL(this.files[0])" />
                    <button class="btn w-100 bg-gradient-primary" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
