@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create') }}</div>
                    <div class="card-body">

                        @if($validate == true)
                        <form method="POST" action="{{ '/create' }}">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image URL') }}</label>

                                <div class="col-md-6">
                                    <input id="image" type="text" class="form-control @error('image') is-invalid @enderror" name="image" required autocomplete="image">

                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="routine" class="col-md-4 col-form-label text-md-right">{{ __('Routine') }}</label>

                                <div class="col-md-6">
                                    <input id="routine" type="text" class="form-control" name="routine" required autocomplete="routine">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="tag" class="col-md-4 col-form-label text-md-right">{{ __('Tag') }}</label>

                                <select  name="tag" class="form-control" style="width:350px">
                                    <option value="">--- Select day ---</option>
                                    <option value="">--- No Tag ---</option>
                                    @foreach ($tags as $tag )
                                        <option value="{{ $tag -> id }}">{{ $tag -> tag }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @else

                        <div>You need to like at least 5 posts in order to create your own</div>

                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
