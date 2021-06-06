<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $sucess_status = 200;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function addTask(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make(
            $request->all(),
            [
                "task" => "required",
                "status" => "in:Pending,Done"
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "validation_errors" => $validator->errors()->add(
                    "status",
                    "Status can only accept Pending or Done as input"
                )
            ]);
        }

        $task_array         =       array(
            "task" => $request->task,
            "status" => $request->status,
            "user_id" => $user->id
        );

        $task               =       Task::create($task_array);
        $task_data = Task::where("id", $task->id)->get();

        if (!is_null($task)) {
            return response()->json(["status" => 1, "success" => true, "message" => "Task added successfully", "task" => $task_data]);
        } else {
            return response()->json(["status" => 0, "success" => false, "message" => "Error! Task could not be added."]);
        }
    }

    public function updateTask(Request $request)
    {
        $user = Auth::user();
        $validator = Validator::make(
            $request->all(),
            [
                "task_id" => "required|numeric",
                "status" => "in:Pending,Done",
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                "validation_errors" => $validator->errors()->add(
                    "status",
                    "Status can only accept Pending or Done as input"
                )
            ]);
        }

        $task_array = array(
            "id" => $request->task_id,
            "status" => $request->status,
        );

        $task_id = $request->task_id;
        $t_status = $request->status;
        $user_id = $user->id;

        if ($task_id != "") {
            $task_status = Task::where("id", $task_id)->update($task_array);
            $task = Task::where("id", $task_id)->get();

            if ($task_status == 1 && $t_status == "Done") {
                return response()->json(["status" => 1, "success" => true, "message" => "Marked task as done", "data" => $task]);
            } else if ($task_status == 1 && $t_status == "Pending") {
                return response()->json(["status" => 1, "success" => true, "message" => "Marked task as pending", "data" => $task]);
            } else {
                return response()->json(["status" => 0, "success" => true, "message" => "Todo not updated"]);
            }
        }
    }


    public function tasks()
    {
        $tasks = array();
        $user = Auth::user();
        $tasks = Task::where("user_id", $user->id)->get();
        if (count($tasks) > 0) {
            return response()->json(["status" => 1, "success" => true, "count" => count($tasks), "data" => $tasks]);
        } else {
            return response()->json(["status" => 0, "success" => false, "message" => "Whoops! no todo found"]);
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
