<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Leave;
use App\Helper\JWTToken;
use App\Models\LeaveCategory;
use Illuminate\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function userRegistration(Request $request){
        try{
            User::create($request->input());

            return response()->json([
                'status'=>'success',
                'message'=>'You have been registered successfully'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'You are fail to register'
            ]);
        }
    }


    function userLoggingIn(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        $count = User::where('email', '=', $email)->where('password', '=', $password)->first();

        if($count !== null){
            $token = JWTToken::createToken($email, $count->id, $count->role);

            return response()->json([
                'status'=>'success',
                'message'=>'You have been logged in successfully',
                'token'=>$token
            ])->cookie('token', $token, 60*24*30);
        }else{
            return response()->json([
                'status'=>'fail',
                'message'=>'Unauthorized user'
            ]);
        }

    }


    function sendOTPCode(Request $request){
        $email = $request->input('email');
        $otp = rand(1000, 9999);

        $count = User::where('email', '=', $email)->count();

        if($count == 1){
            // Send OTP code to user Email
            // Mail::to($email)->send(new OTPMail($otp));

            // Update Otp code in database
            User::where('email', '=', $email)->update(['otp'=>$otp]);

            return response()->json([
                'status'=>'success',
                'message'=>'4 Digit OTP code has been sent to your email'
            ]);
        }else{
            return response()->json([
                'status'=>'Failed',
                'message'=>'Unauthorized from UserController'
            ]);

        }
    }


    function OTPVerification(Request $request){
        $email = $request->input('email');
        $otp = $request->input('otp');

        $count = User::where('email', '=', $email)->where('otp', '=', $otp)->count();

        if($count === 1){
            //OTP update
            User::where('email', '=', $email)->update(['otp'=>'1']);

            // New token create for reset password
            $token = JWTToken::createTokenForResetPassword($email);

            return response()->json([
                'status'=>'success',
                'message'=>'OTP has been varified Successfully',
                'token'=>$token
            ])->cookie('token', $token, 60*24*30);
        }else{
            return response()->json([
                'status'=>'Failed',
                'message'=>'Unauthorized to varified OTP from Controller',
            ]);
        }
    }


    function resetPassword(Request $request){
        try{
            $email = $request->header('email');
           //$id = $request->header('id');
            $password = $request->input('password');

            User::where('email', '=', $email)
           // ->where('id', '=', $id)
            ->update(['password'=>$password]);

            return response()->json([
                'status'=>'Success',
                'message'=>'Password has been reset Successfully'
            ]);
        }
        catch(Exception $error){
            return response()->json([
                'status'=>'Fail',
                'message'=>'Something went wrong'
            ]);
        }
    }


    function showAllUserList(Request $request){
        return User::all();
    }



    function getUserProfileInfo(Request $request){
        $email = $request->header('email');
        $data = User::where('email', '=', $email)->first();

        return response()->json([
            'status'=>'Success',
            'message'=>'Request successful',
            'data'=>$data
        ]);
    }


    function userProfileInfoUpdating(Request $request){
       try{
            $email = $request->header('email');

            User::where('email', '=', $email)->update([
                'name'=>$request->input('name'),
                'phone'=>$request->input('phone'),
                'password'=>$request->input('password'),
                'role'=>$request->input('role'),
            ]);

            return response()->json([
                'status'=>'success',
                'message'=>'You profile has been updated successfully',
            ]);
       }
       catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Request fail to update',
            ]);
       }

    }



    // Dashboard page Routing
    function dashboardPage():View{
        return view('pages.dashboard.dashboard-page');
    }
    
    // logout  Routing
    function userLogout(Request $request){
        return redirect('/userLogin')->cookie('token', '', -1);
    }

    // Page Routing
    function userLoginPage():View{
        return view('pages.auth.login-page');
    }

    function userRegistrationPage():View{
        return view('pages.auth.register-page');
    }

    function sendOTPPage():View{
        return view('pages.auth.send-otp-page');
    }

    function OTPVerificationPage():View{
        return view('pages.auth.otp-verify-page');
    }

    function resetPasswordPage():View{
        return view('pages.auth.password-reset-page');
    }

    function userProfilePage():View{
        return view('pages.dashboard.user-profile-page');
    }


    


    function allLeavesRequest(Request $request){
        return Leave::with('user', 'leaveCategory')->get();
    }

    
    

    





}
