@extends('layout.sidenav-layout')
@section('content')
    @include('components.income.income-list')
    @include('components.income.income-delete')
    @include('components.income.income-create')
    @include('components.income.income-update')
@endsection
