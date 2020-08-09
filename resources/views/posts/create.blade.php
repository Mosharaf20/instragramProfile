@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="offset-2">
            <h2>Add New Post</h2>
        </div>
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-8 offset-2">
                @csrf
                <label for="caption" class="col-md-6 col-form-label ">{{ __('Caption') }}</label>

                <div class="">
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}"  autocomplete="caption" autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group  offset-2 col-md-8">
                <label for="img" class="col-md-6 col-form-label ">{{ __('Post Image') }}</label>

                <div class="">
                    <input  id="img" type="file" class="form-control-file w-auto" @error('image') is-invalid @enderror name="image" value="{{ old('image') }}"  autocomplete="image" autofocus>

                    @error('image')
                <span role="alert" class="text-danger">
                    <small><strong>{{ $message }}</strong></small>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-0 ">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">Add New Post</button>
                </div>
            </div>
        </form>
    </div>
@endsection

