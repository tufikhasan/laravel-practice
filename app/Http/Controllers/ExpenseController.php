<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    public function expenseList()
    {
        return Expense::where('user_id', Auth::id())->get();
    }

    public function createExpense(Request $request)
    {
        $expense = Expense::create([
            'user_id' => Auth::id(),
            'amount'   => $request->amount,
            'description' => $request->description,
            'date' => $request->date,
            'expense_category_id' => $request->expense_category_id, ,
        ]);
        if ($expense) {
            return response()->json(['status'=>'success','message'=>'Expense Created Successfully'],201);
        }
        return response()->json(['status'=>'failed','message'=>'Expense Create Failed'],200);
    }

    public function updateExpense(Request $request)
    {

        $expense = Expense::where( ['id' => $request->id, 'user_id' => Auth::id()] )->first();

        if (!$expense) {
            return response()->json(['message' => 'Expense not found'], 404);
        }
        if ($expense->update($request->only(['amount', 'description', 'date','expense_category_id']))) {
            return response()->json(['status'=>'success','message'=>'Expense Updated Successfully'],200);
        }
        return response()->json(['status'=>'failed','message'=>'Expense Updated Failed'],200);
    }

    public function deleteExpense(Request $request)
    {
        if (Expense::where(['id' => $request->id, 'user_id' => Auth::id()])->delete()) {
            return response()->json(['status'=>'success','message'=>'Expense Deleted Successfully'],200);
        }
        return response()->json(['status'=>'failed','message'=>'Expense Updated Deleted'],200);
    }
}