<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task; // Import the Task model

class TaskController extends Controller
{
    public function index()// Display a list of all tasks use in web.php
    {
        $tasks = Task::all();// Retrieve all tasks from the database
        return view('tasks.index', compact('tasks'));// Pass the tasks to the view (tasks.index ==> index.blade.php)
        // The compact function creates an array with the variable name as the key and its value as the value
        //in this case tasks and due_date in task object like
    }

    public function create()// Show the form to create a new task use in web.php
    {
        return view('tasks.create');// Show the form to create a new task . (tasks.create ==> create.blade.php)
    }

    public function store(Request $request)// Store a new task in the database use in web.php
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create($request->all());// Create a new task with the validated data

        return redirect('/tasks')->with('success', 'Task created successfully.');// Redirect to the tasks index with a success message
        // The with method is used to flash a message to the session, which can be displayed in the view by using like session('success') true/false.
    }

    public function edit($id)// Show the form to edit an existing task use in web.php
    {
        $task = Task::findOrFail($id);// Find the task by its ID or fail if not found
        return view('tasks.edit', compact('task'));// Pass the task to the view for edit (tasks.edit ==> edit.blade.php)
    }

    public function update(Request $request, $id)// Update an existing task in the database use in web.php
    {
        $request->validate([
            'title' => 'required',
            'due_date' => 'required|date',
        ]);

        $task = Task::findOrFail($id);// Find the task by its ID or fail if not found
        $task->update($request->all());// Update the task with the validated data

        return redirect('/tasks')->with('success', 'Task updated successfully.');// Redirect to the tasks index with a success message
    }

    public function destroy($id)// Delete an existing task from the database use in web.php
    {
        $task = Task::findOrFail($id);// Find the task by its ID or fail if not found
        $task->delete();// Delete the task

        return redirect('/tasks')->with('success', 'Task deleted successfully.');// Redirect to the tasks index with a success message
    }
}
