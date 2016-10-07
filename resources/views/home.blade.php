@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Форма добавления</div>

                <div class="panel-body">
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ваше имя">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Email">

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <select name="floor_id" id="floor" class="form-control">
                                        <option value="">Выберите тип проблемы</option>
                                        <option value="">Сеть</option>
                                        <option value="">Софт</option>
                                        <option value="">Компьютеры</option>
                                    </select>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <select name="floor_id" id="floor" class="form-control">
                                        <option value="">Выберите аудиторию</option>
                                        <option value="">308</option>
                                        <option value="">305</option>
                                        <option value="">304</option>
                                    </select>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-xs-12">
                                <div class="col-md-12">
                                    <textarea name="description" id="trouble" cols="30" rows="10" class="form-control" placeholder="Опишите проблему"></textarea>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group col-xs-12">
                                <div class="col-md-12 text-center">
                                    <button class="btn btn-primary">Отправить</button>
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
