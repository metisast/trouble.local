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
        $dataFrom = Carbon::createFromFormat('d.m.Y i:s', $request->get('date_from'))->toDateTimeString();
        if($request->get('date_by')) $dataBy = Carbon::createFromFormat('d.m.Y i:s', $request->get('date_by'))->toDateTimeString();
        else $dataBy = null;

        $result = Task::SearchStat($dataFrom, $dataBy);

        return response()->json(['status' => $result]);
    }
}
