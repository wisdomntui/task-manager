<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Create new task
     * 
     * @param TaskRequest $request - Request object of type Task
     */
    public function create(TaskRequest $request)
    {
        // Get validated request data
        $data = $request->validated();

        try {
            // Create new record
            $task = new Task();
            $task->name = $data['name'];
            $task->project_id = $data['project'];
            $task->description = $data['description'];
            $task->save();

            return response()->json(['status' => true, 'message' => 'Task created successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error creating task!']);
        }
    }
}
