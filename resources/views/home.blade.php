@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Форма добавления</div>

                <div class="panel-body">
                    <form action="{{ route('home.store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            {{--<div class="form-group{{ $errors->has('user_name') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="user_name" value="{{ old('user_name') }}" placeholder="Ваше имя">

                                    @if ($errors->has('user_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('user_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>--}}

                            {{--<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>--}}

                            {{--<div class="form-group{{ $errors->has('task_type_id') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    {!! Helpers::select($taskTypes, 'title', old('task_type_id'), 'Выберите тип проблемы', ['class' => 'form-control', 'name' => 'task_type_id'] ) !!}

                                    @if ($errors->has('task_type_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('task_type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>--}}

                            <div class="form-group{{ $errors->has('room_id') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    {!! Helpers::select($rooms, 'title', old('room_id'), 'Выберите аудиторию', ['class' => 'form-control', 'name' => 'room_id'] ) !!}

                                    @if ($errors->has('room_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('room_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <textarea name="description" cols="30" rows="10" class="form-control" placeholder="Опишите проблему">
                                        {{ old('description') }}
                                    </textarea>

                                    @if ($errors->has('description'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>--}}

                            <div class="form-group col-xs-12">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary">Вызвать системного администратора</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
