@extends('layout.sidenav-layout')
@section('content')
    @include('components.expense_cat.expense-list')
    @include('components.expense_cat.expense-delete')
    @include('components.expense_cat.expense-create')
    @include('components.expense_cat.expense-update')
@endsection
