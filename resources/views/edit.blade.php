@extends('layouts.app')

@section('title')
    Edit Task
@endsection

@section('content')

<!-- Edit Task Form -->
<form action="{{ url('/update', ['task' => $tasks->id]) }}" method="post" class="mt-4 p-4">
    @csrf

    <!-- Task Name Input with pre-filled value -->
    <div class="form-group m-3">
        <label for="name">Task Name</label>
        <input type="text" class="form-control" value="{{$tasks->name}}" name="name">
    </div>

    <!-- Task Description Textarea with pre-filled value -->
    <div class="form-group m-3">
        <label for="description">Task Description</label>
        <textarea class="form-control" name="description" rows="3"> {{$tasks->description}} </textarea>
    </div>

    <!-- Task Status Dropdown with pre-selected value -->
    <div class="form-group m-3">
        <label for="status">Task Status</label>
        <select class="form-control" name="status">
            <option value="pending" {{ $tasks->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $tasks->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="form-group m-3">
        <input type="submit" class="btn btn-primary float-end" value="Submit">
    </div>
</form>

@endsection
