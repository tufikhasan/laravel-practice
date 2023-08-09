<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseCategoryController extends Controller {
    public function expenseCategoryList() {
        return ExpenseCategory::where( 'user_id', Auth::id() )->get();

    }
    public function expenseCategoryCreate( Request $request ) {
        $result = ExpenseCategory::create( [
            'user_id' => Auth::id(),
            'name'    => $request->name,
        ] );
        if ( $result ) {
            return response()->json( ['status' => 'success', 'message' => 'Expense Category Created Successfully'], 201 );
        }
        return response()->json( ['status' => 'failed', 'message' => 'Expense Category Create Failed'], 200 );
    }

    public function expenseCategoryUpdate( Request $request ) {
        $result = ExpenseCategory::where( ['id' => $request->id, 'user_id' => Auth::id()] )->update( $request->only( 'name' ) );
        if ( $result ) {
            return response()->json( ['status' => 'success', 'message' => 'Expense Category Updated Successfully'], 200 );
        }
        return response()->json( ['status' => 'failed', 'message' => 'Expense Category Updated Failed'], 200 );
    }

    public function expenseCategoryDelete( Request $request ) {
        if ( ExpenseCategory::where( ['id' => $request->id, 'user_id' => Auth::id()] )->delete() ) {
            return response()->json( ['status' => 'success', 'message' => 'Expense Category Deleted Successfully'], 200 );
        }
        return response()->json( ['status' => 'failed', 'message' => 'Expense Category Deleted Failed'], 200 );
    }

}
