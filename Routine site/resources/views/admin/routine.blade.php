@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h1>All routines</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="POST" action="{{'/admin'}}">
                            @csrf
                        <ul>
                            @foreach($routines as $routine)
                                <li>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="{{$routine -> id}}" id="{{$routine -> id}}" @if($routine -> active == true) checked @endif onchange="submit();">
                                            <label class="custom-control-label" for="{{$routine -> id}}">{{$routine -> title}} by @foreach($users as $user)@if($routine -> user_id == $user -> id) {{$user -> name}} @endif @endforeach</label>
                                        </div>
                                </li>
                            @endforeach
                        </ul>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
