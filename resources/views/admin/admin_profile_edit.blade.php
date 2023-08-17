@extends('admin.admin_master')
@section('site_title')
    Profile Edit | Devland
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Devland</a></li>
                                <li class="breadcrumb-item active">Edit Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="card-body" method="POST" action="{{ route('update.profile') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <h4 class="card-title">Update profile</h4>
                            <p class="card-title-desc">Update your account's profile information and email address.</p>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="username" name="username"
                                        value="{{ $editData->username }}" disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="name" name="name"
                                        value="{{ $editData->name }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" id="email" name="email"
                                        value="{{ $editData->email }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="p_image" class="col-sm-2 col-form-label">Profile image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="p_image" name="profile_image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg"
                                        src="{{ !empty($editData->profile_image) ? url('upload/admin_images/' . $editData->profile_image) : url('upload/no_image.jpg') }}"
                                        alt="{{ $editData->name }}" id="showImage">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light px-4 rounded mt-3">Update
                                Profile</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#p_image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
