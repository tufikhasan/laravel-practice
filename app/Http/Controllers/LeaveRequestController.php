<?php

namespace App\Http\Controllers;

use App\Models\leave_category;
use App\Models\Leave_request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveRequestController extends Controller {
    function allLeaveRequest() {
        $leave_request = Leave_request::where( 'user_id', Auth::id() )->with( 'leave_category' )->latest()->get();
        return view( 'leave_request.all_request', compact( 'leave_request' ) );
    }
    function addLeaveRequest() {
        $category = leave_category::orderBy( 'name' )->get();
        return view( 'leave_request.add_request', compact( 'category' ) );
    }
    function storeLeaveRequest( Request $request ) {
        $request->validate( [
            'title'             => 'required',
            'leave_start'       => 'required',
            'leave_end'         => 'required',
            'leave_category_id' => 'required',
        ], [
            'leave_category_id.required' => 'Category Is Required',
        ] );
        Leave_request::insert( [
            'title'             => $request->title,
            'description'       => $request->description,
            'leave_start'       => $request->leave_start,
            'leave_end'         => $request->leave_end,
            'leave_category_id' => $request->leave_category_id,
            'user_id'           => Auth::id(),
        ] );

        $notification = [
            'message'    => "Leave request Added Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.request' )->with( $notification );
    }

    function allEmployeesRequest() {
        $all_request = Leave_request::with( ['user', 'leave_category'] )->latest()->get();
        return view( 'request_management.all_users_request', compact( 'all_request' ) );
    }

    function editLeaveRequest( Request $request ) {
        $leave_request = Leave_request::where( 'id', $request->id )->first();
        return view( 'request_management.edit_request', compact( 'leave_request' ) );
    }
    function updateLeaveRequest( Request $request ) {
        $leave_request = Leave_request::where( ['user_id' => $request->user_id, 'id' => $request->id] )->first();

        $leave_request->update( [
            'status' => $request->status,
        ] );

        $notification = [
            'message'    => "Leave request Updated Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.userRequest' )->with( $notification );
    }
    function deleteLeaveRequest( Request $request ) {
        Leave_request::where( ['user_id' => $request->user_id, 'id' => $request->id] )->first()->delete();

        $notification = [
            'message'    => "Leave request Deleted Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.userRequest' )->with( $notification );
    }
}
