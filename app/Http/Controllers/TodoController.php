<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Excel;

use App\Exports\TodoExport;
use App\Imports\Todoimport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TodoController extends Controller
{
    public function store(Request $request)
    {
        $todo=new Todo();
        $todo->task_name=$request->task_name;
        // dd($todo);
        $todo->save();
        return redirect()->back()->with('success','Successfully added the task');


    }

    public function index()
    {
        if(Auth::check()){
        $todo=Todo::all();
        return view('Todo.index',compact('todo'));
    }
}

public function cancel($id)
{
    $data=Todo::find($id);
    $data->status='Cancel';
    $data->save();
    return redirect()->back();

}

public function done($id)
{
    $data=Todo::find($id);
    $data->status='Done';
    $data->save();
    return redirect()->back();

}

//export

public function export()
{
    // dd('export');
    return Excel::download(new TodoExport, 'Todo.xlsx');
}

public function import(Request $request)
{
    // dd('import');
    Excel::import(new Todoimport,$request->file('file'));
}



}
