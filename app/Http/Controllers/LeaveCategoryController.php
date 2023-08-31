<?php

namespace App\Http\Controllers;

use App\Models\LeaveCategory;
use Exception;
use Illuminate\Http\Request;

class LeaveCategoryController extends Controller
{
    function showLeaveCategoryList(Request $request){
        return LeaveCategory::all();
    }

    function leaveCategoryCreation(Request $request){
        try{
            $newCategory = LeaveCategory::create([
                'name'=>$request->input('name')
            ]);
            return response()->json([
                'status'=>'success',
                'message'=>'New leave category has been created',
                'category'=>$newCategory
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Request failed to create new leave category'
            ]);
        }
    }


    function leaveCategoryUpdating(Request $request){
       try{
         $category_id = $request->input('id');

         LeaveCategory::where('id', '=', $category_id)->update([
            'name'=>$request->input('name'),
            'id'=>$request->input('id')
         ]);

         return response()->json([
            'status'=>'success',
            'message'=>'New leave category has been updated'
        ]);

       }
       catch(Exception $e){
            return response()->json([
                'status'=>'fail',
                'message'=>'Request failed to update new leave category'
            ]);
       }

    }


    function leaveCategoryDeleting(Request $request){
        $category_id = $request->input('id');

        LeaveCategory::where('id', '=', $category_id)->delete();

        return response()->json([
            'status'=>'success',
            'message'=>'Leave category has been deleted'
        ]);
    }


















}
