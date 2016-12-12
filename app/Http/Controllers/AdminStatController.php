<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminStatController extends Controller
{
    public function index()
    {
        return view('stat.index');
    }

    public function search(Request $request, Requests\SearchStatRequest $st)
    {
        $data = [];
        $dataFrom = Carbon::createFromFormat('d.m.Y i:s', $request->get('date_from'))->toDateTimeString();
        if($request->get('date_by')) $dataBy = Carbon::createFromFormat('d.m.Y i:s', $request->get('date_by'))->toDateTimeString();
        else $dataBy = Carbon::now()->toDateTimeString();

        $result = Task::SearchStatGroup($dataFrom, $dataBy);
        if(count($request) > 0)
        {
            foreach ($result as $r){
                $data[] = [
                    'cnt' => $r->cnt,
                    'room_title' => $r->rooms->title
                ];
            }

        }

        return response()->json(['rooms' => $data]);
    }
}
