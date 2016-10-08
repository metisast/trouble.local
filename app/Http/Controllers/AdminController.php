<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{

    protected $request;
    protected $task;

    public function __construct(Request $request, Task $task)
    {
        $this->request = $request;
        $this->task = $task;
    }

    public function index()
    {
        return view('admin.index',[
            'i' => $i = 1,
            'tasks' => $this->task->getActiveTasks()
        ]);
    }

    public function show($id)
    {
        return view('admin.show',[
            'task' => $this->task->getTaskById($id)
        ]);
    }

    public function success($id)
    {
        $this->task->checkedTask($id);

        return redirect()->route('admin.index')->with(['status' => 'ok']);
    }

    public function softDelete($id)
    {
        $this->task->softDeleteTask($id);

        return redirect()->route('admin.index')->with(['status' => 'trash']);
    }
}
