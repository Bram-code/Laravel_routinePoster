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

</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Profile') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ '/profile' }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="E-mail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                <div class="col-md-6">
                                    <input id="E-mail" type="text" class="form-control @error('E-mail') is-invalid @enderror" name="E-mail" value="{{$user -> email}}" required autocomplete="email">

                                    @error('E-mail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Change') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Liked') }}</div>
                    <ul>
                        @foreach($routines as $routine)
                            <a href="{{route('detail', ['id' => $routine -> id])}}"><h1>{{$routine -> title}}</h1>
                                by @foreach($users as $user)@if($routine -> user_id == $user -> id) {{$user -> name}} @endif @endforeach
                                <br>

                                <div id="center">
                                    <img src="{{$routine -> image}}" width = "500px">
                                </div>

                            </a>

                            <br><br>
                        @endforeach
                    </ul>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
