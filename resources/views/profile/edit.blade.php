@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="offset-2">
                <h3>Edit Profile</h3>
            </div>
        <form action="{{route('profile.update',[$user->id])}}" enctype="multipart/form-data" method="post" >
            @csrf
            @method('PUT')

            <div class="form-group col-md-8 offset-2">

                <label for="name" class="col-md-6 col-form-label ">{{ __('Title') }}</label>

                <div class="">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title  }}"  autocomplete="title" autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group offset-2 col-md-8">
                <label for="description" class="col-md-6 col-form-label ">{{ __('Description') }}</label>

                <div class="">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description }}"  autocomplete="description" autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group  offset-2 col-md-8">
                <label for="name" class="col-md-6 col-form-label ">{{ __('WebSite') }}</label>

                <div class="">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url }}"  autocomplete="url" autofocus>

                    @error('url')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>
            <div class="form-group  offset-2 col-md-8">
                <label for="img" class="col-md-6 col-form-label ">{{ __('Profile_Img') }}</label>

                <div class="">
                    <input  id="img" type="file" class="form-control-file w-auto" @error('profile_img') is-invalid @enderror name="profile_img" value="{{ old('profile_img')}}"  autocomplete="profile_img" autofocus>

                    @error('profile_img')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>
            </div>

            <div class="form-group mb-0 ">
                <div class="col-md-6 offset-md-2">
                    <button type="submit" class="btn btn-primary">Save Profile</button>
                </div>
            </div>
        </form>
    </div>
@endsection

