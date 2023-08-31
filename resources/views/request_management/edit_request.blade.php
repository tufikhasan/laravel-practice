@extends('admin.admin_master')
@section('site_title')
    Edit Request | Leave
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Request</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Leave</a></li>
                                <li class="breadcrumb-item active">Edit Request</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form id="myForm" class="card-body" method="POST"
                            action="{{ route('update.request', $leave_request->id) }}">
                            @csrf
                            @method('PATCH')
                            <p class="card-title-desc">Edit Category from here</p>
                            <div class="row mb-3">
                                <input type="hidden" name="user_id" value="{{ $leave_request->user_id }}">
                                <label for="leave_end" class="col-sm-2 col-form-label">Request Approved Or Rejected</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="status">
                                        <option value="pending" {{ $leave_request->status == 'pending' ? 'selected' : '' }}>
                                            Pending</option>
                                        <option value="approve" {{ $leave_request->status == 'approve' ? 'selected' : '' }}>
                                            Approved</option>
                                        <option value="reject" {{ $leave_request->status == 'reject' ? 'selected' : '' }}>
                                            Rejected</option>
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-info waves-effect waves-light px-4 rounded mt-3">Update
                                Request</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
