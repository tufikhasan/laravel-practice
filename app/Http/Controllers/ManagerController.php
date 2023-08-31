<?php

namespace App\Http\Controllers;

use App\Mail\LeaveMail;
use App\Models\Leave;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ManagerController extends Controller
{
    // function managerPageShow():View{
    //     return view('pages.manager.manager-page');
    // }

    function managerPageShow():View{
        return view('pages.manager.manager-page');
    }



    function leaveListForManager(Request $request){
        return Leave::with('user', 'leaveCategory')->get();
    }


    function showLeaveById(Request $request){
        $leave_id = $request->input('id');
        return Leave::with('user')->where('id', '=', $leave_id)->first();
    }


    function leaveUpdateByManager(Request $request){
        $user_role = $request->header('role');
        $leave_id = $request->input('id');
        $status = $request->input('status');
        $email = $request->input('email');

        $result = Leave::where('id', '=', $leave_id)
        ->update([           
            'start_date'=>$request->input('start_date'),
            'end_date'=>$request->input('end_date'),
            'reason'=>$request->input('reason'),
            'leave_category_id'=>$request->input('leave_category_id'),
            'status'=>$status

            
        ]);

        if($result){
            // Informing employee by send notification to email
            // Mail::to($email)->send(new LeaveMail($status));

            return response()->json([
                'status'=>'succes',
                'message'=>'Leave request has been updated modified'
            ]);
        }else{
            return response()->json([
                'status'=>'fail',
                'message'=>'Leave request has not been updated'
            ]);
        }

        


    }














}
