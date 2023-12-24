@extends('layouts.app')

@section('title')
    Task List
@endsection

@section('content')

<h2>Task List</h2>

{{-- Filtering Form --}}
<div class="mb-3">
    <form action="{{ url('/') }}" method="get">
        <label for="status" class="me-2">Filter by Status:</label>
        <select name="status" id="status" class="form-select">
            <option value="all" @if(request()->input('status') == 'all') selected @endif>All</option>
            <option value="pending" @if(request()->input('status') == 'pending') selected @endif>Pending</option>
            <option value="completed" @if(request()->input('status') == 'completed') selected @endif>Completed</option>
        </select>
        <button type="submit" class="btn btn-primary">Apply Filter</button>
    </form>
</div>

{{-- Task List Table --}}
<table class="table">
    <thead>
        <tr>
            <!-- Sorting links for Task Name, Description, Status, and Date Created -->
            <th scope="col"><a href="{{ url('/?sort=name') }}">Task Name</a></th>
            <th scope="col"><a href="{{ url('/?sort=description') }}">Description</a></th>
            <th scope="col"><a href="{{ url('/?sort=status') }}">Status</a></th>
            <th scope="col"><a href="{{ url('/?sort=created_at') }}">Date Created</a></th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
            <tr>
                <!-- Displaying task details in each row -->
                <td>{{ $task->name }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->status }}</td>
                <td>{{ $task->created_at->format('d-m-Y') }}</td>
                <td>
                    <!-- Buttons for Edit and Delete actions -->
                    <a href="{{ url('edit', ['task' => $task->id]) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ url('delete', ['task' => $task->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
