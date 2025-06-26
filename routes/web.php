<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);//index is a method in TaskController that displays a list of all tasks
Route::get('/tasks/create', [TaskController::class, 'create']);//create is a method in TaskController that shows a form to create a new task
Route::post('/tasks', [TaskController::class, 'store']); //store is a method in TaskController that saves a new task to the database
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);// edit is a method in TaskController that shows a form to edit an existing task
Route::put('/tasks/{id}', [TaskController::class, 'update']); // update is a method in TaskController that updates an existing task in the database
Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
