@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Выполненные задачи</div>

                    <div class="panel-body">
                        Общие количество выволненных задач - {{ $allTasks }}
                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                @if(count($tasks) > 0)
                <div class="list-group">
                    @foreach($tasks as $task)
                        <a href="{{ route('admin.show', $task->id) }}" class="list-group-item">{{$task->rooms->title }}</a>
                    @endforeach
                </div>
                @endif
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
@endsection