<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\LeaveRequestController;
use Illuminate\Support\Facades\Route;

Route::get( '/', [DashboardController::class, 'dashboardMethod'] )->middleware( ['auth', 'verified'] )->name( 'dashboard' );

Route::middleware( ['auth'] )->group( function () {

    //Admin Controller
    Route::controller( AdminController::class )->group( function () {
        Route::get( '/admin/logout', 'destroy' )->name( 'admin.logout' );
        Route::get( '/admin/profile', 'Profile' )->name( 'admin.profile' );
        Route::get( '/edit/profile', 'editProfile' )->name( 'edit.profile' );
        Route::post( '/update/profile', 'updateProfile' )->name( 'update.profile' );
        Route::get( '/change/password', 'changePassword' )->name( 'change.password' );
        Route::post( '/change/password', 'updatePassword' )->name( 'update.password' );
    } );

    //Leave all route
    Route::controller( LeaveCategoryController::class )->group( function () {
        Route::middleware( 'manager' )->group( function () {
            Route::get( '/all/category', 'allLeaveCategory' )->name( 'all.category' );
            Route::get( '/add/category', 'addLeaveCategory' )->name( 'add.category' );
            Route::post( '/add/category', 'storeLeaveCategory' )->name( 'store.category' );
            Route::get( '/edit/category/{id}', 'editLeaveCategory' )->name( 'edit.category' );
            Route::patch( '/edit/category/{id}', 'updateLeaveCategory' )->name( 'update.category' );
            Route::get( '/delete/category/{id}', 'deleteLeaveCategory' )->name( 'delete.category' );
        } );
    } );

    //Leave request all route
    Route::controller( LeaveRequestController::class )->group( function () {
        Route::middleware( 'manager' )->group( function () {
            Route::get( '/employees/request', 'allEmployeesRequest' )->name( 'all.userRequest' );
            Route::get( '/edit/request/{id}', 'editLeaveRequest' )->name( 'edit.request' );
            Route::patch( '/edit/request/{id}', 'updateLeaveRequest' )->name( 'update.request' );
            Route::get( '/delete/request/{id}/{user_id}', 'deleteLeaveRequest' )->name( 'delete.request' );
        } );

        Route::middleware( 'employee' )->group( function () {
            Route::get( '/all/request', 'allLeaveRequest' )->name( 'all.request' );
            Route::get( '/add/request', 'addLeaveRequest' )->name( 'add.request' );
            Route::post( '/add/request', 'storeLeaveRequest' )->name( 'store.request' );
        } );
    } );
} );

require __DIR__ . '/auth.php';