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
                    @foreach($routine as $data)
                    <div class="card-header"><h1>{{$data->title}}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div><h2>Made by: @foreach($users as $user)@if($data -> user_id == $user -> id) {{$user -> name}} @endif @endforeach</h2></div>

                            <div><p>{{$data -> description}}</p></div>

                            <section id="center">
                                <img><img src="{{$data -> image}}"></div>

                                <div>{{$data -> routine}}</div>
                            </section>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
