@extends('layouts.app')

@section('title')
    Details
@endsection

@section('content')

<!-- Task Details Card -->
<div class="card text-center mt-5">
    <div class="card-header">
        <b>TASK DETAILS</b>
    </div>
    <div class="card-body">
        <!-- Displaying Task Name -->
        <h5 class="card-title">{{$tasks->name}}</h5>
        
        <!-- Displaying Task Description -->
        <p class="card-text">{{$tasks->description}}.</p>
        
        <!-- Edit Button linking to the Edit route with task ID -->
        <a href="{{ url('edit', ['task' => $tasks->id]) }}" class="btn btn-primary">Edit</a>
        
        <!-- Delete Button linking to the Delete route with task ID -->
        <a href="/delete/{{$tasks->id}}" class="btn btn-danger">Delete</a>
    </div>
</div>

@endsection
