<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;
use App\Task;

class TaskController extends BaseController
{
    public function create(Request $request)
    {
        $inputs = $request->only('name');

        if($inputs['name'] == null) {
            return redirect('/');
        }

    	$task = new Task();
        $task->name = $inputs['name'];
        $task->is_complete = false;
    	$task->save();

        return redirect('/');
    }

    public function toggleComplete($id)
    {
        try {

            $task = Task::findOrFail($id);
            $task->is_complete = !$task->is_complete;
            $task->save();

            return redirect('/');

        } catch (Exception $e) {
            return redirect('/')->withErrors($e);
        }
    }

    public function clearComplete()
    {
        $tasks = Task::where('is_complete', true)->get();

        foreach($tasks as $task) {
            $task->delete();
        }

        return redirect('/');
    }
}

