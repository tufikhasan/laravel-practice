<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PromotionalMailController;
use Illuminate\Support\Facades\Route;

Route::get( '/dashboard', function () {
    return view( 'pages.dashboard' );
} )->name( 'dashboard' )->middleware( 'verify.token' );

Route::controller( AuthenticationController::class )->group( function () {
    Route::middleware( 'redirect.VerifyToken' )->group( function () {
        Route::get( '/register', 'registerPage' )->name( 'register' );
        Route::post( '/register', 'registration' );

        Route::get( '/', 'loginPage' )->name( 'login' );
        Route::post( '/user/login', 'userLogin' );

        Route::get( '/send/otp', 'forgetPage' )->name( 'forgot.password' );
        Route::post( '/send/otp', 'sendOtp' );

        Route::get( '/verify/otp', 'verifyOtpPage' )->name( 'verify.otp' );
        Route::get( '/countdown/{email}', 'showCountdown' )->name( 'countdown' )->withoutMiddleware( 'redirect.VerifyToken' );
        Route::post( '/verify/otp', 'verifyOtp' );
    } );

    Route::middleware( 'verify.token' )->group( function () {
        Route::get( '/users', 'allUsers' );
        Route::post( '/reset/password', 'resetPassword' );
        Route::get( '/reset/password', 'resetPasswordPage' )->name( 'reset.password' );

        Route::get( '/profiles', 'profilePage' )->name( 'profile.page' );
        Route::get( '/profile/details', 'profileDetails' )->name( 'profile.details' );
        Route::patch( '/profile/update', 'profileUpdate' )->name( 'profile.update' );
        Route::post( '/profile/image', 'profileImgUpdate' )->name( 'profile.image' );

        Route::get( '/change/password', 'changePassword' )->name( 'change.password' );
        Route::patch( '/change/password', 'updatePassword' )->name( 'password.update' );
    } );

    Route::get( '/user/logout', 'userLogout' )->name( 'logout' );

} );

Route::middleware( 'verify.token' )->group( function () {
    Route::controller( CustomerController::class )->group( function () {
        //Api Routes
        Route::delete( '/customers/{id}', 'deleteCustomer' )->name( 'delete.customer' );
        Route::post( '/customers/{id}', 'updateCustomer' )->name( 'update.customer' );
        Route::get( '/customers/{id}', 'singeCustomer' )->name( 'single.customer' );
        Route::post( '/customers', 'addCustomer' )->name( 'add.customer' );
        Route::get( '/customers', 'getCustomers' )->name( 'customers' );

        //Page Routes
        Route::get( '/customer/list', 'customerPage' )->name( 'customer.page' );
    } );

    Route::controller( PromotionalMailController::class )->group( function () {
        //Api Routes
        Route::post( '/promotional/mail', 'sendPromotionMail' )->name( 'promotion.mail' );
        Route::get( '/promotional/mail', 'promotionPage' )->name( 'promotion.page' );
    } );
} );
