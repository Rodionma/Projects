<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function create(Request $req)
    {
        $valid = $req->validate([
            'name' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'description' => 'required|min:5',
        ]);

        $task = new Task();
        $task->name = $req['name'];
        $task->description = $req['description'];
        $task->date = $req['date'];

        $task->save();

        return redirect()->route('main');
    }

    //-------------------------------------------------------------------------
    public function updateform($id)
    {
        $task = new Task();

        return view('update', ['data' => $task->find($id)], ['pagename' => 'Обновить задачу']);
    }

    //-------------------------------------------------------------------------

    public function updatesubmit(Request $req)
    {
        $valid = $req->validate([
            'name' => 'required',
            'date' => 'required|date|after_or_equal:today',
            'description' => 'required|min:5',
        ]);

        $task = Task::find($req['id']);
        $task->name = $req['name'];
        $task->description = $req['description'];
        $task->date = $req['date'];

        $task->save();

        return redirect()->route('main');
    }

    public function delete($id)
    {
       Task::find($id)->delete();
       return redirect()->route('main');
    }

//-------------------------------------------------------------------------------------
    public function getdata()
    {

        $task = new Task();
        return view('main', ['data' => $task->all()], ['pagename' => 'Мои задачи']);
    }

}
