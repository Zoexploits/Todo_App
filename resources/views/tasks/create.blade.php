    @extends('layouts.app')
     
    @section('content')
    <h1>New Task</h1>
    @if ($errors->any())
    <div class="alert alert-danger"  role="alert">
        <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
        <!-- {{print_r($errors->all( ))}} -->
        </ul>
    </div>
    @endif


    <form action="/tasks" method="POST">
        <div class="form-group">
            @csrf
            <label for="description">Task Description</label>
            <input name="description" class="form-control" />
        </div>

        <div class="form-group">
            <button class="btn btn-primary" style=" margin-top: 20px;">Create Task</button>
        </div>
    </form>
@endsection


<!-- Here is another modification to my completed_at -->
 <!-- Hello World -->