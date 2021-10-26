@extends('layouts.app')

@section('content')

    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h1>{{$title}}</h1></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <ul>
                            @foreach($routines as $routine)
                                <li><a class ='nocolor' href="{{route('detail', ['id' => $routine -> id])}}"><h2>{{$routine -> title}}</h2></a>
                                    <a href="{{route('edit', ['id' => $routine -> id])}}"><p>Edit</p></a>
                                    <a href="{{route('delete', ['id' => $routine -> id])}}"><p>Delete</p></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
