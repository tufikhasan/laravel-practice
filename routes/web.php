<?php

use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeCategoryController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get( '/', function () {
    return view( 'dashboard' );
} )->middleware( ['auth', 'verified'] )->name( 'dashboard' );

Route::middleware( 'auth' )->group( function () {
    Route::get( '/profile', [ProfileController::class, 'edit'] )->name( 'profile.edit' );
    Route::patch( '/profile', [ProfileController::class, 'update'] )->name( 'profile.update' );
    Route::delete( '/profile', [ProfileController::class, 'destroy'] )->name( 'profile.destroy' );

    //Expense Category All Route
    Route::controller( ExpenseCategoryController::class )->group( function () {
        Route::get( '/expense_categories', 'expenseCategoryList' );
        Route::post( '/expense_categories', 'expenseCategoryCreate' );
        Route::patch( '/expense_categories', 'expenseCategoryUpdate' );
        Route::delete( '/expense_categories', 'expenseCategoryDelete' );
    } );

    //Expense All Route
    Route::controller( ExpenseController::class )->group( function () {
        Route::get( '/expense', 'expenseList' );
        Route::post( '/expense', 'createExpense' );
        Route::patch( '/expense', 'updateExpense' );
        Route::delete( '/expense', 'deleteExpense' );
    } );

    //Income Category All Route
    Route::controller( IncomeCategoryController::class )->group( function () {
        Route::get( '/income_categories', 'incomeCategoryList' );
        Route::post( '/income_categories', 'incomeCategoryCreate' );
        Route::patch( '/income_categories', 'incomeCategoryUpdate' );
        Route::delete( '/income_categories', 'incomeCategoryDelete' );
    } );

    //Income All Route
    Route::controller( IncomeController::class )->group( function () {
        Route::get( '/income', 'incomeList' );
        Route::post( '/income', 'createIncome' );
        Route::patch( '/income', 'updateIncome' );
        Route::delete( '/income', 'deleteIncome' );
    } );
} );

require __DIR__ . '/auth.php';
