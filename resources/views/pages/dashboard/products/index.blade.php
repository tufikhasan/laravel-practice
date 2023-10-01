@extends('layouts.dashboard')
@section('site_title', 'Products')
@section('content')
    @include('components.dashboard.products.index')
    @include('components.dashboard.products.add_modal')
    @include('components.dashboard.products.edit_modal')
    @include('components.dashboard.products.delete_modal')
@endsection
