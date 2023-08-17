<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventCategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    $events = Event::with( 'event_category' )->latest()->paginate( 5 );
    return view( 'frontend.index', compact( 'events' ) );
} )->name( 'home.page' );

Route::get( '/event/{id}', function ( Request $request ) {
    $event = Event::where( 'id', $request->id )->with( ['event_category', 'reservation'] )->first();
    return view( 'frontend.event_details', compact( 'event' ) );
} )->name( 'event' );

Route::get( '/dashboard', [DashboardController::class, 'dashboardMethod'] )->middleware( ['auth', 'verified'] )->name( 'dashboard' );

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

    //Event Event all route
    Route::controller( EventCategoryController::class )->group( function () {
        Route::get( '/all/category', 'allEventCategory' )->name( 'all.category' );
        Route::get( '/add/category', 'addEventCategory' )->name( 'add.category' );
        Route::post( '/add/category', 'storeEventCategory' )->name( 'store.category' );
        Route::get( '/edit/category/{id}', 'editEventCategory' )->name( 'edit.category' );
        Route::patch( '/edit/category/{id}', 'updateEventCategory' )->name( 'update.category' );
        Route::get( '/delete/category/{id}', 'deleteEventCategory' )->name( 'delete.category' );
    } );

    //Event all route
    Route::controller( EventController::class )->group( function () {
        Route::get( '/all/event', 'allEvent' )->name( 'all.event' );
        Route::get( '/add/event', 'addEvent' )->name( 'add.event' );
        Route::post( '/add/event', 'storeEvent' )->name( 'store.event' );
        Route::get( '/edit/event/{id}', 'editEvent' )->name( 'edit.event' );
        Route::patch( '/edit/event/{id}', 'updateEvent' )->name( 'update.event' );
        Route::get( '/delete/event/{id}', 'deleteEvent' )->name( 'delete.event' );
        Route::get( '/event/details/{id}', 'EventDetails' )->name( 'event.details' )->withoutMiddleware( 'auth' );
        Route::get( '/category/events/{id}', 'categoryEvents' )->name( 'category.events' )->withoutMiddleware( 'auth' );
        Route::get( '/events', 'eventPage' )->name( 'event.page' )->withoutMiddleware( 'auth' );
    } );

} );

//Contact all route
Route::controller( ReservationController::class )->group( function () {
    Route::post( '/reservation', 'reservation' )->name( 'reservation' );
} );

require __DIR__ . '/auth.php';