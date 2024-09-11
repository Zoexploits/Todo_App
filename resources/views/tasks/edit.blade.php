@extends('layouts.app')

@section('content')
    <h1>Edit Task</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div>
            <label for="description">Task Description:</label>
            <input class="form-control" style=" margin-top: 5px;"  type="text" name="description" style value="{{ $task->description }}" required maxlength="255">
        </div>

        <button class="btn btn-primary" style=" margin-top: 20px;" type="submit">Update Task</button>
    </form>
@endsection