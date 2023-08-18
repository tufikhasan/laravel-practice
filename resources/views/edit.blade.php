@extends('app')
@section('title', 'Edit')
@section('content')
    <div class="row d-flex justify-content-center">
        <form class="card shadow p-4" method="POST" action="{{ route('update', $todo->id) }}">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="description" class="form-control" id="title" placeholder="Title" name="title"
                    value="{{ old('title', $todo->title ?? '') }}">
                @error('title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description', $todo->description ?? '') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
