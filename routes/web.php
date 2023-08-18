<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::controller( TodoController::class )->group( function () {
    Route::get( '/', 'allTodos' )->name( 'todos' );
    Route::get( '/todo', 'addTodo' )->name( 'add' );
    Route::post( '/todo', 'storeTodo' )->name( 'store' );
    Route::get( '/todo/{id}', 'editTodo' )->name( 'edit' );
    Route::patch( '/todo/{id}', 'updateTodo' )->name( 'update' );
    Route::get( '/todo/del/{id}', 'deleteTodo' )->name( 'delete' );
} );