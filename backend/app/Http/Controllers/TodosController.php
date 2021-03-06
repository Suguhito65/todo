<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index')->with('todos', $todos);
    }

    public function store(Request $request) {
        $todo = new Todo();
        $todo->body = $request->body;
        $todo->save();
        \Session::flash('err_msg', '追加しました。');
        return redirect('/');
    }

    public function edit(todo $todo) {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Request $request, todo $todo) {
        $todo->body = $request->body;
        $todo->save();
        \Session::flash('err_msg', '更新しました。');
        return redirect('/');
    }

    public function destroy(todo $todo) {
        $todo->delete();
        \Session::flash('err_msg', '削除しました。');
        return redirect('/');
    }
}
