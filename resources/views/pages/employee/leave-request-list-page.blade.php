@extends('layouts.sidenav-layout')
@section('content')
    @include('components.employee.leave-request-list')
    @include('components.employee.create-new-leave-form')
@endsection