<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function incomeList()
    {
        return Income::where('user_id', Auth::id())->get();
    }

    public function createIncome(Request $request)
    {
        $income = Income::create([
            'user_id' => Auth::id(),
            'amount'   => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'income_category_id' => $request->income_category_id, ,
        ]);
        if ($income) {
            return response()->json(['status'=>'success','message'=>'Income Created Successfully'],201);
        }
        return response()->json(['status'=>'failed','message'=>'Income Create Failed'],200);
    }

    public function updateIncome(Request $request)
    {

        $income = Income::where( ['id' => $request->id, 'user_id' => Auth::id()] )->first();

        if (!$income) {
            return response()->json(['message' => 'Income not found'], 404);
        }
        if ($income->update($request->only(['amount', 'description', 'date','income_category_id']))) {
            return response()->json(['status'=>'success','message'=>'Income Updated Successfully'],200);
        }
        return response()->json(['status'=>'failed','message'=>'Income Updated Failed'],200);
    }

    public function deleteIncome(Request $request)
    {
        if (Income::where(['id' => $request->id, 'user_id' => Auth::id()])->delete()) {
            return response()->json(['status'=>'success','message'=>'Income Deleted Successfully'],200);
        }
        return response()->json(['status'=>'failed','message'=>'Income Deleted Failed'],200);
    }
}
