@extends('admin.admin_master')
@section('site_title')
    Profile | Devland
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Profile</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Devland</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Info  -->
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <!-- Simple card -->
                    <div class="card">
                        <img class="rounded-circle avatar-lg mx-auto mt-4 mb-2"
                            src="{{ !empty($adminData->profile_image) ? url('upload/admin_images/' . $adminData->profile_image) : url('upload/no_image.jpg') }}"
                            alt="{{ $adminData->name }}">
                        <div class="card-body">
                            <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                            <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                            <!-- <p class="card-text"></p> -->
                            <a href="{{ route('edit.profile') }}"
                                class="btn btn-primary waves-effect waves-light px-4 rounded mt-3">Edit Profile</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
@endsection
