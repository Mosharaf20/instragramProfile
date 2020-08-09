@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 ">
            <img class="img-fluid  rounded-circle  h-100 offset-2" style="width: 150px" src="{{asset($user->profile->profileImage())}}" alt="">
        </div>
        <div class="col-9 pt-4">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center">
                    <h3 class="pr-3">instagramProfile</h3>
                    <follow-me user-id="{{$user->id}}" follows="{{$follows}}"></follow-me>
                </div>
                @can('update',$user->profile)
                    <a href="{{route('post.create')}}">Add New Post</a>
                @endcan
            </div>
            @can('update',$user->profile)
                <a class="" href="{{route('profile.edit',[$user->id])}}">Edit Profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-4"><b>{{$postCount}}k</b> posts</div>
                <div class="pr-4"><b>{{$followersCount}}k</b> followers</div>
                <div class=""><b>{{$followingCount}}k</b> following</div>
            </div>
            <div class="pt-3">
                <b>{{$user->profile->title}}</b>
            </div>
            <div>{{$user->profile->description}}</div>
            <div><a href="">{{$user->profile->url}}</a></div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-3 pb-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-3">
                <a href="{{route('post.show',[$post->id])}}">
                    <img class="w-100" src="{{asset('/storage/'.$post->image)}}" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection
