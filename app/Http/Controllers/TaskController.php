<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TaskController extends BaseController
{
    public function create(Request $request)
    {
        $inputs = $request->only('name');

        if($inputs['name'] == null)
        {
            return redirect('/');
        }

    	$task = new \App\Task();
        $task->name        = $inputs['name'];
        $task->is_complete = false;
    	$task->save();

        return redirect('/');
    }

    public function toggleComplete($id)
    {
        try {
            $task = \App\Task::findOrFail($id);

            $task->is_complete = $task->is_complete ? false : true;

            $task->save();

            return redirect('/');

        } catch (Exception $e) {

            return redirect('/')->withErrors($e);
        }
    }

    public function clearComplete()
    {
        $tasks = \App\Task::all();

        foreach($tasks as $task)
        {
            $task->delete();
        }

        return redirect('/');
    }
}
