@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                @if (session('status'))
                    <div class="alert alert-success">
                        Летим на помощь!
                        <a href="{{ route('home.index') }}">Не прилетел?</a>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection