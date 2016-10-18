<?php

namespace App\Http\Controllers;

use App\Events\NewTaskAdded;
use App\Http\Requests;
use App\Models\Room;
use App\Models\Task;
use App\Models\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    protected $request;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TaskType $taskType, Room $room)
    {
        return view('home',[
            'taskTypes' => $taskType->getAllTypes(),
            'rooms' => $room->getAllRooms()
        ]);
    }

    public function store(Requests\TaskPublishRequest $taskPublishRequest, Task $task)
    {
        //dd($this->request->all());

        /*Mail::send('emails.welcome', array('key' => 'value'), function($message)
        {
            $message->to('metis_ast@mail.ru', 'Джон Смит')->subject('Привет!');
        });*/

        $task = $task->createTask($this->request);

        event(
            new NewTaskAdded($task)
        );

        return redirect()->route('home.success')->with('status', 'ok');
    }

    public function success()
    {
        if (!session('status'))
        {
            return redirect()->route('home.index');
        }

        return view('home.success');
    }
}
