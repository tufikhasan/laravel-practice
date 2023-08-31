<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use Illuminate\View\View;
use Illuminate\Http\Request;

class LeaveReportController extends Controller
{
    function eployeeLeaveReportShow():View{
        return view('pages.employee.leave-report-page');
    }


    private function calculateUsedLeaveDays($leave)
    {
        $startDate = Carbon::parse($leave->start_date);
        $endDate = Carbon::parse($leave->end_date);

        return $startDate->diffInDays($endDate) + 1;
    }


    function calculateAvailableLeaveDays(Request $request){
        $userId = $request->header('id');

        $user = User::where('id', $userId)->first();

         $allocatedLeaveDays = $user->available_leave;
        
         $approvedLeaveDays = Leave::where('user_id', $userId)
            ->where('status', 'approved')
            ->get();

            $usedLeaveDays = 0;
            foreach ($approvedLeaveDays as $leave) {
                $usedLeaveDays += $this->calculateUsedLeaveDays($leave);
            }
    
            $result = max(0, $allocatedLeaveDays - $usedLeaveDays);

            return response()->json([
                'status'=>'success',
                'message'=>'Calculation succesfully done',
                'result'=>$result,
                'totalLeaveDays'=>$allocatedLeaveDays
            ]);


        // return max(0, $allocatedLeaveDays - $usedLeaveDays);

         
    }


    

}
