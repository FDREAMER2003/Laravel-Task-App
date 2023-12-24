<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here you can register web routes for your application. These routes are
| loaded by the RouteServiceProvider within a group that contains the "web"
| middleware group. Now create something great!
|
*/

// Route to display the task list (index)
Route::get('/', [TaskController::class, 'index']);

// Route to display the task creation form
Route::get('create', [TaskController::class, 'create']);

// Route to display task details for a specific task
Route::get('details/{task}', [TaskController::class, 'details']);

// Route to display the task edit form for a specific task
Route::get('edit/{task}', [TaskController::class, 'edit']);

// Route to handle the submission of the task edit form
Route::post('update/{task}', [TaskController::class, 'update']);

// Route to delete a specific task
Route::get('delete/{task}', [TaskController::class, 'delete']);

// Route to handle the submission of the task creation form
Route::post('store-data', [TaskController::class, 'store']);
