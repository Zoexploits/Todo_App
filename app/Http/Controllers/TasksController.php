<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(){

        $tasks = Task::orderBy('completed_at')
        ->orderBy('id', 'ASC')
        ->get();


        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
    }


    public function create(){
        return view('tasks.create');
    }

    public function store(){

        // request()->all();
        
        request()->validate([
            'description' => 'required|max:255',
        ]);

        
        Task::create([
            'description' => request('description'),

        ]);
        // return request()->all();
        return redirect('/');

    }

    public function update($id){
        // Validate the input
        request()->validate([
            'description' => 'required|max:255',
        ]);
    
        // Find the task by its ID
        $task = Task::findOrFail($id);
    
        // Update the task description
        $task->description = request('description');
    
        // Set the task to "uncompleted" by clearing the completed_at field
        $task->completed_at = null;
    
        // Save the changes
        $task->save();
    
        return redirect('/');
    }
    
    // {
    //     $task = Task::where('id', $id)->first();

    //     $task->completed_at = now();
    //     $task->save();

    //     $task->updated_at = now();
    //     $task->save();

    //         // Validate the input
    //     request()->validate([
    //         'description' => 'required|max:255',
    //     ]);

    //     // Find the task by its ID
    //     $task = Task::findOrFail($id);

    //     // Update the task with new data
    //     $task->description = request('description');
    //     $task->save();


    //     return redirect('/');
    // }
    
    public function delete($id){
        $task = Task::where('id', $id)->first();

        $task->delete();
        return redirect('/');

    }

    public function edit($id){
        // retrieve the task by its ID
        $task = Task::findOrFail($id);

        // return the edit view with the task data
        return view('tasks.edit', compact('task'));
    }

    public function complete($id)
{
    // Find the task by its ID
    $task = Task::findOrFail($id);

    // Set the task to "completed" by adding the current timestamp to the completed_at field
    $task->completed_at = now();

    // Save the changes
    $task->save();

    return redirect('/');
}



}

// Hello
// This is a test on my file
