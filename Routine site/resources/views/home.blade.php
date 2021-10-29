@extends('layouts.app')

@section('content')

<style>
    a, a:hover{
        text-decoration: none;
        color: black;
    }
    img{
        max-width: 600px;
    }
    #center{
        text-align: center;
    }
    form{
        margin: 20px;
    }

    .form-control{
        text-align: center;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                <form method="GET" action="#">
                        <input class="form-control" type="text" name="search" placeholder="What are you interested in?">

                <div class="container">
                    <div class="form-group">
                        <select onchange="this.form.submit()" name="tag" class="form-control" style="width:250px">
                            <option value="">--- Select day ---</option>
                            @foreach ($tags as $tag )
                                <option value="{{ $tag -> id }}">{{ $tag -> tag }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </form>

            <div class="card">
                <div class="card-header">{{ __('newest routine') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($routines as $routine)
                            <a href="{{route('detail', ['id' => $routine -> id])}}"><h1>{{$routine -> title}}</h1>
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
