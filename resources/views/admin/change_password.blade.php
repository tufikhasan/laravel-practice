@extends('admin.admin_master')
@section('site_title')
    Change Password | Devland
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Change Password</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Devland</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="card-body" method="POST" action="{{ route('update.password') }}">
                            @csrf
                            <p class="card-title-desc">Update your password.</p>
                            @if (count($errors))
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ $error }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            @endif

                            <div class="row mb-3">
                                <label for="old_password" class="col-sm-2 col-form-label">Old password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="old_password" name="old_password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="new_password" class="col-sm-2 col-form-label">New password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="new_password" name="new_password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm_password" class="col-sm-2 col-form-label">Confirm password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" id="confirm_password"
                                        name="confirm_password">
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-info waves-effect waves-light px-4 rounded mt-3">Update
                                Profile</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
