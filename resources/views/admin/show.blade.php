@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Задача №{{ $task->id }}</div>

                    <div class="panel-body">
                        {{ $task->description }}
                        <hr>

                        <h4>Автор</h4>
                        <p>Имя: <i>{{ $task->user_name }}</i></p>
                        <p>Email: <i>{{ $task->email }}</i></p>
                        <p>Тип проблемы: <i>{{ $task->task_type_id }}</i></p>
                        <p>Аудитория: <i>{{ $task->room_id }}</i></p>
                        <p>Дата: <i>{{ $task->created_at->format('d.m.Y h.i') }}</i></p>
                        <hr>

                        <h4>Действия</h4>
                        <a href="{{ route('admin.success', $task->id) }}" class="btn btn-success">
                            <i class="glyphicon glyphicon-ok"></i> Завершить</a>
                        <a href="{{ route('admin.softDelete', $task->id) }}" class="btn btn-danger">
                            <i class="glyphicon glyphicon-trash"></i> В корзину</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection