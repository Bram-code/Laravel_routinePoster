@extends('layouts.app')

@section('content')

<style>
    img{
        max-width: 600px;
    }
    #center{
        text-align: center;
    }
</style>
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
                            <a href=""><li><h1>{{$routine -> title}}</h1>
                            by @foreach($users as $user)@if($routine -> user_id == $user -> id) {{$user -> name}} @endif @endforeach</li>
                            <br>

                            <div id="center">
                                <img src="{{$routine -> image}}" width = "500px">
                            </div>

                            </a>

                            <br><br>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
