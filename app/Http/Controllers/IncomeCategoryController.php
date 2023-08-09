<?php

namespace App\Http\Controllers;

use App\Models\IncomeCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeCategoryController extends Controller {
    public function incomeCategoryList() {
        return IncomeCategory::where( 'user_id', Auth::id() )->get();

    }
    public function incomeCategoryCreate( Request $request ) {
        $result = IncomeCategory::create( [
            'user_id' => Auth::id(),
            'name'    => $request->name,
        ] );
        if ( $result ) {
            return response()->json( ['status' => 'success', 'message' => 'Income Category Created Successfully'], 201 );
        }
        return response()->json( ['status' => 'failed', 'message' => 'Income Category Create Failed'], 200 );
    }

    public function incomeCategoryUpdate( Request $request ) {
        $result = IncomeCategory::where( ['id' => $request->id, 'user_id' => Auth::id()] )->update( $request->only( 'name' ) );
        if ( $result ) {
            return response()->json( ['status' => 'success', 'message' => 'Income Category Updated Successfully'], 200 );
        }
        return response()->json( ['status' => 'failed', 'message' => 'Income Category Updated Failed'], 200 );

    }

    public function incomeCategoryDelete( Request $request ) {
        if ( IncomeCategory::where( ['id' => $request->id, 'user_id' => Auth::id()] )->delete() ) {
            return response()->json( ['status' => 'success', 'message' => 'Income Category Deleted Successfully'], 200 );
        }
        return response()->json( ['status' => 'failed', 'message' => 'Income Category Deleted Failed'], 200 );
    }
}
