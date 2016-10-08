@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Выполненные задачи</div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                @if (session('status') == 'ok')
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Задача успешно выполнена!
                    </div>
                @elseif(session('status') == 'trash')
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        Задача добавлена в корзину!
                    </div>
                @endif
            </div>
            <div class="col-md-10 col-md-offset-1">
                @if(count($tasks) > 0)
                <div class="list-group">
                    @foreach($tasks as $task)
                        <a href="{{ route('admin.show', $task->id) }}" class="list-group-item">{{$i++.'. '. $task->description }}</a>
                    @endforeach
                </div>
                @else
                    <div class="alert alert-success" role="alert">Нет активных задач</div>
                @endif
            </div>
        </div>
    </div>
@endsection