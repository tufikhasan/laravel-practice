<?php

namespace App\Http\Controllers;

use App\Models\leave_category;
use Illuminate\Http\Request;

class LeaveCategoryController extends Controller {
    function allLeaveCategory() {
        $leave_category = leave_category::latest()->get();
        return view( 'leave_category.all_category', compact( 'leave_category' ) );
    }
    function addLeaveCategory() {
        return view( 'leave_category.add_category' );
    }
    function storeLeaveCategory( Request $request ) {
        leave_category::insert( ['name' => $request->name] );

        $notification = [
            'message'    => "Leave Category Added Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.category' )->with( $notification );
    }

    function editLeaveCategory( Request $request ) {
        $category = leave_category::where( 'id', $request->id )->first();
        return view( 'leave_category.edit_category', compact( 'category' ) );
    }
    function updateLeaveCategory( Request $request ) {
        $category = leave_category::where( 'id', $request->id )->first();

        $category->update( ['name' => $request->name] );

        $notification = [
            'message'    => "Leave Category Updated Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.category' )->with( $notification );
    }
    function deleteLeaveCategory( Request $request ) {
        leave_category::where( 'id', $request->id )->first()->delete();

        $notification = [
            'message'    => "Leave Category Deleted Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'all.category' )->with( $notification );
    }
}
