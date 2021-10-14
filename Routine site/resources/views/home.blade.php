@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($routines as $routine)
                            <li><h1>{{$routine -> title}}</h1> by @foreach($users as $user)@if($routine -> user_id == $user -> id) {{$user -> name}} @endif @endforeach</li>

                            <img src="{{$routine -> image}}">
                            <br><br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
