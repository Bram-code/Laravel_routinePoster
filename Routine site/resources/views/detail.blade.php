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

                    <div class="card-header"><h1>{{$routine->title}}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                            <div><h2>Made by: @foreach($users as $user)@if($routine -> user_id == $user -> id) {{$user -> name}} @endif @endforeach</h2></div>

                            <div><p>{{$routine -> description}}</p></div>

                            <section id="center">
                                <img><img src="{{$routine -> image}}"></div>

                                <div><p>{{$routine -> routine}}</p></div>
                            </section>
                    @auth
                    @if ($check == false)
                        <form method="post" action="{{'/like/' . $routine->id}}">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Like') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                    @if ($check == true)
                        <form method="post" action="{{'/nolike/' . $routine->id}}">
                            @csrf
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Remove like') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                    @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
