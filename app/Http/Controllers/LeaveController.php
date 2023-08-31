<?php

namespace App\Http\Controllers;

use App\Notifications\NewLeaveRequestNotification;
use Exception;
use App\Models\User;
use App\Models\Leave;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class LeaveController extends Controller
{

    function leaveRequestPage():View{
        return view('pages.employee.leave-request-page');
    }


    function allLeaveRequestShow():View{
        return view('pages.employee.leave-request-list-page');
    }






    function displayLeaveList(Request $request){
        try{
            $user_id = $request->header('id');
        //     $user_id = $request->header('id');
        //    return Leave::with('leaveCategory')->where('user_id ','=', $user_id)->get();

           return Leave::with('leaveCategory')->where('user_id', '=', $user_id)->get();

        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Request fail'
            ]);
        }
    }

    function leaveCreation(Request $request){
        try{
          $user_id = $request->header('id');

          Leave::create([
            'start_date'=>$request->input('start_date'),
            'end_date'=>$request->input('end_date'),
            'reason'=>$request->input('reason'),
            'user_id'=>$user_id,
            'leave_category_id'=>$request->input('leave_category_id')
          ]);

          // Notifying manager about the leave request
        //   $managers = User::where('role', 'manager')->get();
        //   Notification::send($managers, new NewLeaveRequestNotification());

            
            return response()->json([
                'status'=>'success',
                'message'=>'Your request has been submitted to manager'
            ]);


        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Request fail to submit to manager'
            ]);
        }
    }





    function sabujLeave(Request $request){
        return Leave::with('user', 'leaveCategory')->get();
    }





}
