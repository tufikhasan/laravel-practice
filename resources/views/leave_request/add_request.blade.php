@extends('admin.admin_master')
@section('site_title')
    Add Request | Leave
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Add Request</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Leave</a></li>
                                <li class="breadcrumb-item active">Add Request</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="myForm" class="card-body" method="POST" action="{{ route('store.request') }}">
                            @csrf
                            <p class="card-title-desc">Add Request from here</p>
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span class="text-danger">{{ $error }}</span><br>
                                @endforeach
                            @endif
                            <div class="row mb-3">
                                <label for="title_info" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title_info" name="title"
                                        value="{{ old('title', $title ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="description" rows="10">{{ old('description', $description ?? '') }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="leave_start" class="col-sm-2 col-form-label">Start Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="leave_start" name="leave_start"
                                        value="{{ old('leave_start', $leave_start ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="leave_end" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="leave_end" name="leave_end"
                                        value="{{ old('leave_end', $leave_end ?? '') }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="leave_end" class="col-sm-2 col-form-label">End Date</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="leave_category_id">
                                        @foreach ($category as $value)
                                            <option value="{{ $value->id }}"
                                                {{ old('leave_category_id') == $value->id ? 'selected' : '' }}>
                                                {{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-info waves-effect waves-light px-4 rounded mt-3">Add new
                                Request</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    name: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: 'Please enter the category name'
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    error.insertAfter(element);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid').removeClass('is-valid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                }
            });
        });
    </script>
@endsection
