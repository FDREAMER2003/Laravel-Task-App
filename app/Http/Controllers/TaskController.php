<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; 
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    // Display the list of tasks with optional filtering and sorting
    public function index(Request $request)
    {
        // Query builder for tasks
        $tasks = Task::query();

        // Filtering tasks based on status
        if ($request->has('status') && $request->input('status') !== 'all') {
            $tasks->where('status', $request->input('status'));
        }

        // Sorting tasks based on user input
        $sortField = $request->input('sort', 'created_at');
        $sortDirection = $request->input('direction', 'desc');
        $tasks->orderBy($sortField, $sortDirection);

        // Retrieve the tasks
        $tasks = $tasks->get();

        // Pass tasks to the index view
        return view('index')->with('tasks', $tasks);
    }

    // Display the task creation form
    public function create()
    {
        return view('create');
    }

    // Display details of a specific task
    public function details(Task $task)
    {
        return view('details')->with('tasks', $task);
    }

    // Display the task edit form for a specific task
    public function edit(Task $task)
    {
        return view('edit')->with('tasks', $task);
    }

    // Update a task based on user input
    public function update(Request $request, Task $task)
    {
        // Validate user input
        $this->validateTask($request, $task);
    
        // Retrieve user input
        $data = $request->all();
    
        // Update task details
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->status = $data['status'];
        $task->save();
    
        // Flash success message and redirect to the task list
        session()->flash('success', 'Task updated successfully');
        return redirect('/')->with('status', 'success');
    }

    // Delete a specific task
    public function delete(Task $task)
    {
        $task->delete();

        // Redirect to the task list
        return redirect('/');
    }

    // Store a new task based on user input
    public function store(Request $request)
    {
        // Validate user input
        $this->validateTask($request);

        // Retrieve user input
        $data = $request->all();

        // Create a new task
        $task = new Task();
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->status = $data['status'];
        $task->save();

        // Flash success message and redirect to the task list
        session()->flash('success', 'Task created successfully');
        return redirect('/')->with('status', 'success');
    }
    protected function validateTask(Request $request, Task $task = null)
    {
        $rules = [
            'name' => ['required', 'max:100'],
            'description' => ['required'],
            'status' => ['required', Rule::in(['pending', 'completed'])],
        ];

        if ($task) {
            // Exclude the current task from the unique validation rule during an update
            $rules['name'][] = Rule::unique('tasks')->ignore($task->id);
        } else {
            // For creating a new task
            $rules['name'][] = Rule::unique('tasks');
        }

        $this->validate($request, $rules, [
            'name.max' => 'Task name cannot be more than 100 characters.',
        ]);
    }
}
