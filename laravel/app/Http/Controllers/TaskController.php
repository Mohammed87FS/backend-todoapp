<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all tasks from the database
        $tasks = Task::all();
    
        // Log the number of tasks
        \Log::info('Number of tasks: ' . $tasks->count());
    
        // Return the tasks with a 200 OK HTTP status
        return response()->json($tasks, Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request...
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'sometimes|boolean',
        ]);

        // Create a new task using the validated data
        $task = Task::create($validatedData);

        // Return the created task with a 201 Created HTTP status
        return response()->json($task, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Return the task with a 200 OK HTTP status
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        // Find the task by ID and validate the request...
        $task = Task::findOrFail($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'completed' => 'sometimes|boolean',
        ]);

        // Update the task with validated data
        $task->update($validatedData);

        // Return the updated task with a 200 OK HTTP status
        return response()->json($task, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        // Find the task by ID
        $task = Task::findOrFail($id);

        // Delete the task
        $task->delete();

        // Return a 204 No Content HTTP status
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
