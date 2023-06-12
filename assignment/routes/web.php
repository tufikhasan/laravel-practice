<?php

use App\Http\Controllers\AssignmentController;
use Illuminate\Support\Facades\Route;

Route::get( '/getExcerptDescription', [AssignmentController::class, 'getExcerptDescription'] );
Route::get( '/firstRecordDescription', [AssignmentController::class, 'firstRecordDescription'] );
Route::get( '/getDescription', [AssignmentController::class, 'getDescription'] );
Route::get( '/getAllTitle', [AssignmentController::class, 'getAllTitle'] );
Route::post( '/insertPost', [AssignmentController::class, 'insertPost'] );
Route::patch( '/update', [AssignmentController::class, 'update'] );
Route::delete( '/delete', [AssignmentController::class, 'delete'] );
Route::get( '/getPostByMinRead', [AssignmentController::class, 'getPostByMinRead'] );
Route::post( '/increments', [AssignmentController::class, 'increments'] );
