@extends('admin.admin_master')
@section('site_title')
    Events | Devland
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">All Events</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Devland</a></li>
                                <li class="breadcrumb-item active">All Events</li>
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
                                        <th>Image</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Location</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $key => $value)
                                        <tr>
                                            <td style="width: 20px">{{ $key + 1 }}
                                            </td>
                                            <td><img src="{{ !empty($value->image) ? url('upload/event/' . $value->image) : url('upload/no_image.jpg') }}"
                                                    alt="{{ $key }}" class="rounded avatar-sm"></td>
                                            <td>{{ $value->event_category_id }}</td>
                                            <td>{{ $value->title }}</td>
                                            <td>{!! $value->description !!}</td>
                                            <td>{{ $value->date }}</td>
                                            <td>{{ $value->time }}</td>
                                            <td>{{ $value->location }}</td>
                                            <td>
                                                <a href="{{ route('edit.event', $value->id) }}"
                                                    class="btn btn-info sm waves-effect waves-light mr-2"
                                                    title="Edit Event"><i class="fas fa-edit"></i></a>
                                                <a id="delete_data_alert" href="{{ route('delete.event', $value->id) }}"
                                                    class="btn btn-danger sm waves-effect waves-light mr-2"
                                                    title="Delete Event"><i class=" fas fa-trash-alt"></i></a>
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
