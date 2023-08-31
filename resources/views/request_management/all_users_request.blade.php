@extends('admin.admin_master')
@section('site_title')
    Request | Leave
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Request</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Leave</a></li>
                                <li class="breadcrumb-item active">All Request</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>SL NO:</th>
                                        <th>Employee</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start</th>
                                        <th>End</th>
                                        <th>Type</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($all_request as $key => $value)
                                        <tr>
                                            <td style="width: 20px">{{ $key + 1 }}
                                            </td>
                                            <td>{{ $value['user']['name'] }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{{ $value->description }}</td>
                                            <td>{{ $value->leave_start }}</td>
                                            <td>{{ $value->leave_end }}</td>
                                            <td>{{ $value['leave_category']['name'] }}</td>
                                            <td><button
                                                    class="btn btn-sm {{ $value->status == 'approve' ? 'btn-success' : ($value->status == 'reject' ? 'btn-danger' : 'btn-info') }}">{{ $value->status }}</button>
                                            </td>
                                            <td>
                                                <a href="{{ route('edit.request', $value->id) }}"
                                                    class="btn btn-info sm waves-effect waves-light mr-2"
                                                    title="Edit request"><i class="fas fa-edit"></i></a>
                                                <a id="delete_data_alert"
                                                    href="{{ route('delete.request', ['id' => $value->id, 'user_id' => $value->user_id]) }}"
                                                    class="btn btn-danger sm waves-effect waves-light mr-2"
                                                    title="Delete request"><i class=" fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection
