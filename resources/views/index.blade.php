@extends('app')
@section('title', 'All Todo')
@section('content')
    <!-- Content Row -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Todo List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SL NO:</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SL NO:</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($todos as $key => $todo)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->description }}</td>
                                <td>
                                    <a href="{{ route('edit', $todo->id) }}" class="btn btn-sm btn-info"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('delete', $todo->id) }}" class="btn btn-sm btn-danger delete_alert"><i
                                            class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
