@extends('layouts.app')

@section('title')
    Create Tasks
@endsection

@section('content')

<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Task Creation Form -->
<form action="store-data" method="post" class="mt-4 p-4">
    @csrf

    <!-- Task Name Input -->
    <div class="form-group m-3">
        <label for="name">Task Name</label>
        <input type="text" class="form-control" name="name">
    </div>

    <!-- Task Description Textarea -->
    <div class="form-group m-3">
        <label for="description">Task Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>

    <!-- Task Status Dropdown -->
    <div class="form-group m-3">
        <label for="status">Task Status</label>
        <select class="form-control" name="status">
            <!-- Options for Pending and Completed -->
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
        </select>
    </div>

    <!-- Submit Button -->
    <div class="form-group m-3">
        <input type="submit" class="btn btn-primary float-end" value="Submit">
    </div>
</form>

@endsection
