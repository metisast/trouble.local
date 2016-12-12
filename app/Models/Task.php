<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    protected $fillable = ['user_id', 'user_name', 'email', 'task_type_id', 'room_id', 'description', 'task_status_id'];

    /* Relation */
    public function rooms()
    {
        return $this->belongsTo('App\Models\Room', 'room_id');
    }

    public function taskTypes()
    {
        return $this->belongsTo('App\Models\TaskType', 'task_type_id');
    }

    /* Queries */
    static public function createTask($request)
    {
        return parent::create([
            /*'user_id' => Auth::user()->id,*/
            /*'user_name' => $request->get('user_name'),
            'email' => $request->get('email'),
            'task_type_id' => $request->get('task_type_id'),*/
            'room_id' => $request->get('room_id'),
            /*'description' => $request->get('description'),*/
            'task_status_id' => 1
        ]);
    }

    static public function getActiveTasks()
    {
        return parent::where('task_status_id', '=', 1)->orderBy('id', 'DESC')->get();
    }

    static public function getSuccessTasksByPage()
    {
        return parent::where('task_status_id', '=', 2)->orderBy('id', 'DESC')->paginate(10);
    }

    static public function getAllSuccessTasks()
    {
        return parent::where('task_status_id', '=', 2)->count();
    }

    static public function getSoftDeleteTasks()
    {
        return parent::where('task_status_id', '=', 3)->orderBy('id', 'DESC')->get();
    }

    static public function getTaskById($id)
    {
        return parent::findOrFail($id);
    }

    static public function checkedTask($id)
    {
        $task = parent::findOrFail($id);
        $task->task_status_id = 2;
        $task->save();

        return $task;
    }

    static public function softDeleteTask($id)
    {
        $task = parent::findOrFail($id);
        $task->task_status_id = 3;
        $task->save();

        return $task;
    }

    static public function deleteTask($id)
    {
        return parent::destroy($id);
    }

    /* Stat searches */
    static public function SearchStat($dateFrom, $dateBy)
    {
        return parent::where('created_at', '>=', $dateFrom)->where('task_status_id', '=', 2)->get();
    }
}
