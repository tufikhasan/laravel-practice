<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense_cat = Expense::all();
        return view('pages.dashboard.expense-page', compact('expense_cat'));
    }

    public function ExpenseList()
    {
        $user_id = auth()->user()->id;

        return Expense::where('user_id', '=', $user_id)->get();
    }

    public function createExpense(Request $request)
    {

        $name = $request->name;
        $amount = $request->amount;

        $desc = $request->desc;
        $date = $request->date;

        $user_id = auth()->user()->id;
        $expense_cat_id = $request->expense_cat_id;

        return Expense::create([
            'name' => $name,
            'amount' => $amount,
            'desc' => $desc,
            'date' => $date,
            'user_id' => $user_id,
            'expense_category_id' => $expense_cat_id,
        ]);
    }

    public function ExpenseById(Request $request)
    {
        $expense_id = $request->input('id');

        $user_id = $request->header('id');

        return Expense::where('id', $expense_id)->first();
    }

    public function updateExpense(Request $request)
    {

        $Expense_id = $request->id;

        $Expense = Expense::find($Expense_id);

        if (!$Expense) {
            return response()->json(['message' => 'Expense not found'], 404);
        }

        // Update only the fields that are provided in the request
        return $Expense->update($request->only(['name', 'amount', 'desc', 'date']));
    }

    public function deleteExpense(Request $request)
    {
        $expense_id = $request->id;

        return Expense::where('id', '=', $expense_id)->delete();
    }
}
