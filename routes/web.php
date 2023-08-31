<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LeaveController;
use App\Http\Middleware\ManagerMiddleware;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LeaveCategoryController;
use App\Http\Controllers\LeaveReportController;
use App\Http\Middleware\TokenVerificationMiddleware;
use GuzzleHttp\Middleware;
use Illuminate\Database\Capsule\Manager;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Page Route
Route::get('/userLogin', [UserController::class, 'userLoginPage']);
Route::get('/userRegistration', [UserController::class, 'userRegistrationPage']);
Route::get('/sendOTP', [UserController::class, 'sendOTPPage']);
Route::get('/verifyOtp', [UserController::class, 'OTPVerificationPage']);

Route::get('/resetPassword', [UserController::class, 'resetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);

// Dashboard page Route
Route::get('/dashboard', [UserController::class, 'dashboardPage'])->middleware([TokenVerificationMiddleware::class]);

// User Profile page
Route::get('/userProfile', [UserController::class, 'userProfilePage'])->middleware([TokenVerificationMiddleware::class]);


// Loagout Page Route
Route::get('/logout', [UserController::class, 'userLogout']);

Route::get('/leaveRequestPage', [LeaveController::class, 'leaveRequestPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/allLeaveRequest', [LeaveController::class, 'allLeaveRequestShow'])->middleware([TokenVerificationMiddleware::class]);

// Leave report page
// Route::get('/eployeeLeaveReport', [LeaveController::class, 'eployeeLeaveReportShow'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/eployeeLeaveReport',[LeaveReportController::class, 'eployeeLeaveReportShow'])->middleware([TokenVerificationMiddleware::class]);




// Authentication Ajux API Route
Route::post('/user-register', [UserController::class, 'userRegistration']);
Route::post('/user-login', [UserController::class, 'userLoggingIn']);
Route::post('/send-otp', [UserController::class, 'sendOTPCode']);
Route::post('/otp-verify', [UserController::class, 'OTPVerification']);
Route::get('/all-user-list', [UserController::class, 'showAllUserList']);

Route::post('/password-reset', [UserController::class, 'resetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile-info', [UserController::class, 'getUserProfileInfo'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-profile-info-update', [UserController::class, 'userProfileInfoUpdating'])->middleware([TokenVerificationMiddleware::class]);

// Leave Category Ajux API Route
Route::get('/leave-category-list', [LeaveCategoryController::class, 'showLeaveCategoryList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/leave-category-create', [LeaveCategoryController::class, 'leaveCategoryCreation'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/leave-category-update', [LeaveCategoryController::class, 'leaveCategoryUpdating'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/leave-category-delete', [LeaveCategoryController::class, 'leaveCategoryDeleting'])->middleware([TokenVerificationMiddleware::class]);

// Leave Ajux API Route
Route::get('/leave-list', [LeaveController::class, 'displayLeaveList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/leave-create', [LeaveController::class, 'leaveCreation'])->middleware([TokenVerificationMiddleware::class]);



// Leave update Ajux API Route
Route::post('/leave-update', [ManagerController::class, 'leaveUpdateByManager'])->middleware([ManagerMiddleware::class]);
Route::get('/managerPage', [ManagerController::class, 'managerPageShow'])->middleware([ManagerMiddleware::class]);
Route::get('/leave-list-manager', [ManagerController::class, 'leaveListForManager'])->middleware([ManagerMiddleware::class]);
Route::post('/leave-by-id', [ManagerController::class, 'showLeaveById'])->middleware([ManagerMiddleware::class]);



// Route::get('/sabujLeave', [LeaveController::class, 'sabujLeave'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/available-leave-days', [LeaveReportController::class, 'calculateAvailableLeaveDays'])->middleware([TokenVerificationMiddleware::class]);

