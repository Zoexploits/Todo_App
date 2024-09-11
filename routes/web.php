<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;





// Route to display the list of tasks
Route::get('/', [TasksController::class, 'index'])->name('tasks.index');

// Route to show the form for creating a new task
Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');

// Route to store a new task
Route::post('/tasks', [TasksController::class, 'store'])->name('tasks.store');

// Route to show the form for editing a task
Route::get('/tasks/{task}/edit', [TasksController::class, 'edit'])->name('tasks.edit');

// Route to update a task
Route::patch('/tasks/{task}', [TasksController::class, 'update'])->name('tasks.update');

// Route to mark a task as complete
Route::patch('/tasks/{task}/complete', [TasksController::class, 'complete'])->name('tasks.complete');

// Route to delete a task
Route::delete('/tasks/{task}', [TasksController::class, 'delete'])->name('tasks.destroy');


// Route::get('/', [TasksController::class, 'index']);
// Route::get('/tasks', [TasksController::class, 'index']);
// Route::get('/tasks/create', [TasksController::class, 'create']);
// Route::post('/tasks', [TasksController::class, 'store']);
// Route::patch('/tasks/{id}', [TasksController::class, 'update']);
// Route::delete('/tasks/{id}', [TasksController::class, 'delete']);
// Route::patch('/tasks/{id}/complete', [TasksController::class, 'complete']); 

// Route::get('tasks/{id}/edit', [TasksController::class, 'edit']);
// Route::patch('/tasks/{id}', [TasksController::class, 'update']);


// Route::get('/tasks/create', 'TasksController@create');

// Route::post('/tasks', 'TasksController@store');