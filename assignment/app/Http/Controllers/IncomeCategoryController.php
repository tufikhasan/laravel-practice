<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use App\Models\Income;
use App\Models\IncomeCategory;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    public function index()
    {
        $income_cat = IncomeCategory::all();
        return view('pages.dashboard.expense-category', compact('income_cat'));
    }
    // C R U D

    public function incomeCategoryList()
    {
        $user_id = auth()->user()->id;
        return IncomeCategory::where('user_id', '=', $user_id)->get();

    }

    public function incomeCategoryCreate(Request $request)
    {
        $user_id = auth()->user()->id;
        $name = $request->name;

        return IncomeCategory::create([
            'name' => $name,
            'user_id' => $user_id,
        ]);
    }

    public function incomeCategoryUpdate(Request $request)
    {
        // $user_id = auth()->user()->id;

        $income_cat_id = $request->id;
        return IncomeCategory::where('id', '=', $income_cat_id)->update([
            'name' => $request->name,
        ]);
    }

    public function incomeCategoryDelete(Request $request)
    {
        $income_cat_id = $request->id;

        $hasIncomes = Income::where('income_category_id', $income_cat_id)->exists();

        if ($hasIncomes) {
            return response()->json(['message' => 'Cannot delete. There are incomes associated with this category.'], 400);
        }

        return IncomeCategory::where('id', '=', $income_cat_id)->delete();
    }

}
