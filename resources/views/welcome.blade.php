@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Добро пожаловать</div>

                <div class="panel-body">
                    Есть проблема, напишите нам!
                        <a href="/home" class="btn btn-success">Добавить задачу</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
