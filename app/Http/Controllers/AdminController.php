<?php

namespace App\Http\Controllers;

use App\Events\DeleteTaskEvent;
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
            'tasks' => $this->task->getSuccessTasksByPage(),
            'allTasks' => $this->task->getAllSuccessTasks()
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

    /* Success task */
    public function success($id)
    {
        $check = $this->task->checkedTask($id);

        event(
            new DeleteTaskEvent($check)
        );

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
