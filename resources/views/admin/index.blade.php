@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Админ панель</div>

                    <div class="panel-body">
                        Запросы на сегодня
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
                    <div class="row" id="task-block">
                        @foreach($tasks as $task)
                            <div class="col-md-3 col-xs-6 task-item-{{ $task->id }}">
                                <section class="task-item active">
                                    <div class="col-md-6 col-xs-6">
                                        <header>
                                            {{ $task->rooms['title'] }}
                                        </header>
                                    </div>
                                    <div class="col-md-6 col-xs-6">
                                        <article>
                                            <a href="{{ route('admin.success', $task->id) }}"><i class="fa fa-check-square-o fa-2x"></i></a>
                                        </article>
                                    </div>
                                </section>
                            </div>
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="row" id="task-block">

                    </div>
                    <div class="alert alert-success" role="alert">Нет активных задач</div>
                @endif
            </div>
        </div>
    </div>
@endsection