@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row pt-3 pb-4">
            <div class="col-7 pb-3">
                <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" alt="">
            </div>
            <div class="col-5">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle " style="width: 40px;height: 40px" src="{{asset($post->user->profile->profileImage())}}" alt="">
                    <a class="pl-2 pr-1 text-dark font-weight-bold" href="{{route('profile.index',[$post->user->id])}}">{{$post->user->username}}</a>
                    <a href="">Follow</a>
                </div>
                <hr>
                <div class="d-flex pl-2">
                    <a class="pl-2 pr-1 text-dark font-weight-bold" href="{{route('profile.index',[$post->user->id])}}">{{$post->user->username}}</a>
                    <p>{{$post->caption}}</p>
                </div>

            </div>
        </div>
    </div>
@endsection
