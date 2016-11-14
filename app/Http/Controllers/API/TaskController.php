<?php

namespace App\Http\Controllers\API;

use App\Events\DeleteTaskEvent;
use App\Models\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskAr = [];
        $tasks = Task::getActiveTasks();
        foreach ($tasks as $task)
        {
            $taskAr[] = [
                'id' => $task->id,
                'room_name' => $task->rooms->title
            ];
        }

        return response()->json([
            'tasks' => $taskAr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test = $request->get('room_id');
        return response()->json(['test' => $test]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Task $task)
    {
        dd($task->where('id', '=', $id)->findOrFail());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::checkedTask($id);

        event(
            new DeleteTaskEvent($task)
        );

        return response()->json([
            'status' => 'deleted'
        ]);
    }
}
