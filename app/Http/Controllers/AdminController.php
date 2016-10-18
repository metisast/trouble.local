<?php

namespace App\Http\Controllers;

use App\Events\NewTaskAdded;
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

    public function indexSuccess()
    {
        return view('admin.indexSuccess',[
            'i' => $i = 1,
            'tasks' => $this->task->getSuccessTasks()
        ]);
    }

    public function indexTrash()
    {
        return view('admin.indexTrash',[
            'i' => $i = 1,
            'tasks' => $this->task->getSoftDeleteTasks()
        ]);
    }

    public function show($id)
    {
        return view('admin.show',[
            'task' => $this->task->getTaskById($id)
        ]);
    }

    /* Added new task */
    public function success($id)
    {
        $check = $this->task->checkedTask($id);

        return redirect()->route('admin.index')->with(['status' => 'ok']);
    }

    public function softDelete($id)
    {
        $this->task->softDeleteTask($id);

        return redirect()->route('admin.index')->with(['status' => 'trash']);
    }

    public function delete($id)
    {
        $this->task->deleteTask($id);

        return redirect()->route('admin.index.trash')->with(['status' => 'ok']);
    }
}
