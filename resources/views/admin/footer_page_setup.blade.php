@extends('admin.admin_master')
@section('site_title')
    Footer Setup | Devland
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Footer Setup</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Devland</a></li>
                                <li class="breadcrumb-item active">Footer Setup</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="card-body" method="POST" action="{{ route('update.footer', $footer->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <p class="card-title-desc">Update your fooer information.</p>
                            <div class="row mb-3">
                                <label for="number" class="col-sm-2 col-form-label">Mobile Number</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="number" name="number"
                                        value="{{ $footer->number }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                                <div class="col-sm-10">
                                    <textarea id="short_description" name="short_description" class="form-control" rows="3">{{ $footer->short_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="country" class="col-sm-2 col-form-label">Country</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="country" name="country"
                                        value="{{ $footer->country }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <textarea id="address" name="address" class="form-control" rows="3">{{ $footer->address }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="email" name="email"
                                        value="{{ $footer->email }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="social_title" class="col-sm-2 col-form-label">Social Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="social_title" name="social_title"
                                        value="{{ $footer->social_title }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="social_description" class="col-sm-2 col-form-label">Social Description</label>
                                <div class="col-sm-10">
                                    <textarea id="social_description" name="social_description" class="form-control" rows="3">{{ $footer->social_description }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="facebook" name="facebook"
                                        value="{{ $footer->facebook }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="twitter" name="twitter"
                                        value="{{ $footer->twitter }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="linkedIn" class="col-sm-2 col-form-label">linkedIn</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="linkedIn" name="linkedIn"
                                        value="{{ $footer->linkedIn }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="copyright" class="col-sm-2 col-form-label">Copyright</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="copyright" name="copyright"
                                        value="{{ $footer->copyright }}">
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-info waves-effect waves-light px-4 rounded mt-3">Update
                                Footer</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
