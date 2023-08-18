<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller {
    function allTodos() {
        $todos = Todo::latest()->get();
        return view( 'index', compact( 'todos' ) );
    }
    function addTodo() {
        return view( 'add' );
    }
    function storeTodo( Request $request ) {
        $request->validate( [
            'title' => 'required',
        ] );
        Todo::create( $request->only( 'title', 'description' ) );

        $notification = [
            'message'    => "Todo Created Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'todos' )->with( $notification );
    }

    function editTodo( Request $request ) {
        $todo = Todo::findOrFail( $request->id );
        return view( 'edit', compact( 'todo' ) );
    }
    function updateTodo( Request $request ) {
        $request->validate( [
            'title' => 'required',
        ] );
        Todo::findOrFail( $request->id )->update( $request->only( 'title', 'description' ) );
        $notification = [
            'message'    => "Todo Updated Successfully",
            'alert-type' => 'success',
        ];
        return redirect()->route( 'todos' )->with( $notification );
    }

    function deleteTodo( Request $request ) {
        Todo::findOrFail( $request->id )->delete();
        return redirect()->back();
    }
}
