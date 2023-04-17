<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Requests\DeleteTaskRequest;
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

    /**
     * Update task
     * 
     * @param UpdateTaskRequest $request - Request object of type UpdateTask
     */
    public function update(UpdateTaskRequest $request)
    {
        // Get validated request data
        $data = $request->validated();

        try {
            // Create new record
            $task = Task::findOrFail($data['id']);
            $task->name = $data['name'];
            $task->project_id = $data['project'];
            $task->description = $data['description'];
            $task->save();

            return response()->json(['status' => true, 'message' => 'Task updated successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error updating task!']);
        }
    }

    /**
     * Delete task
     * 
     * @param DeleteTaskRequest $request - Request object of type UpdateTask
     */
    public function delete(DeleteTaskRequest $request)
    {
        // Get validated request data
        $data = $request->validated();

        try {
            // Create new record
            $task = Task::findOrFail($data['id']);
            $task->delete();

            return response()->json(['status' => true, 'message' => 'Task deleted successfully!']);
        } catch (\Throwable $th) {
            return response()->json(['status' => false, 'message' => 'Error deleting task!']);
        }
    }
}
