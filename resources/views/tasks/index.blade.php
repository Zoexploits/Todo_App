@extends('layouts.app')

@section('content')
    <h1>Task List</h1>

    <!-- Display / Render all of the tasks that we have -->
    @foreach ($tasks as $task)
        <div class="card @if($task->isCompleted()) border-success @endif" style="margin-bottom: 20px;">
            <div class="card-body">
                <p>
                    @if($task->isCompleted())
                        <span class="badge badge-success">Completed</span>
                    @endif 
                    {{ $task->description }}
                </p>
                
                <!-- Corrected Edit button -->
                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-block">Edit</a>

                @if(!$task->isCompleted())
                    <!-- Corrected Complete button for uncompleted tasks -->
                    <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                        @method('PATCH')
                        @csrf
                        <button class="btn btn-light btn-block" type="submit">Complete</button>
                    </form>
                @else
                    <!-- Corrected Delete button for completed tasks -->
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-block" type="submit">Delete</button>
                    </form>
                @endif
            </div>
        </div>
    @endforeach

    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-block btn-lg">New Task</a>
@endsection
