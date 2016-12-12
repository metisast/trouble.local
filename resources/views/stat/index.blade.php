@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Отчеты</div>

                    <div class="panel-body">

                    </div>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-1">
                <div class="col-md-10">
                    <h4>Выберите дату</h4>
                </div>
                <form id="stat" data-url="{{ route('admin.stat.search') }}">
                    <div class="row">
                        <div class='col-md-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker6'>
                                    <input type='text' class="form-control" name="date_from"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                                <label class="control-label"></label>
                            </div>
                        </div>
                        <div class='col-md-6'>
                            <div class="form-group">
                                <div class='input-group date' id='datetimepicker7'>
                                    <input type='text' class="form-control" name="date_by"/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-success" id="send">Сформировать</button>
                        </div>
                    </div>
                </form>
                <div class="row" id="result">

                </div>
            </div>
        </div>
    </div>
@endsection