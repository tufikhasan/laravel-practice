@extends('admin.admin_master')
@section('site_title')
    Event Edit | Devland
@endsection
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Edit Event</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Devland</a></li>
                                <li class="breadcrumb-item active">Edit Event</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form class="card-body" method="POST" action="{{ route('update.event', $event->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <p class="card-title-desc">Edit Event from here</p>
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Event Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="title" name="title"
                                        value="{{ old('title', $event->title ?? '') }}">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Event Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Event Category select" name="event_category_id">
                                        <option>Open this select menu</option>
                                        @foreach ($eventCategories as $category)
                                            <option value={{ $category->id }}
                                                {{ old('event_category_id', isset($event->event_category_id) && $event->event_category_id == $category->id ? 'selected' : '') }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="elm1" class="col-sm-2 col-form-label">Event Description</label>
                                <div class="col-sm-10">
                                    <textarea id="elm1" name="description">{{ old('description', $event->description ?? '') }}</textarea>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="date" class="col-sm-2 col-form-label">Event Date</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="date" name="date"
                                        value="{{ old('date', $event->date ?? '') }}">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="time" class="col-sm-2 col-form-label">Event Time</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="time" id="time" name="time"
                                        value="{{ old('time', $event->time ?? '') }}">
                                    @error('time')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="location" class="col-sm-2 col-form-label">Event Location</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="location" name="location"
                                        value="{{ old('location', $event->location ?? '') }}">
                                    @error('location')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Event Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <img class="rounded avatar-lg"
                                        src="{{ !empty($event->image) ? url('upload/event/' . $event->image) : url('upload/no_image.jpg') }}"
                                        alt="{{ $event->title }}" id="showEventImage">
                                </div>
                            </div>
                            <!-- end row -->
                            <button type="submit" class="btn btn-info waves-effect waves-light px-4 rounded mt-3">Update
                                Event</button>
                        </form>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#image").change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showEventImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
