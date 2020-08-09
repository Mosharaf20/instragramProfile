@extends('layouts.app')

@section('content')


    <div class="container mt-3">
        <div class="row justify-content-center">
            @foreach($allUsers as $allUser)
            <div class="col-2 ">
                <div class="card mt-3">
                    <div class="card-header d-flex align-items-center">
                        <span class="mr-2"><a class="text-dark"  href="">{{$allUser->username}}</a></span>
                    </div>
                    <div class="card-body">
                        <div><a href="{{route('profile.index',[$allUser->profile->id])}}"><img class="w-100 " style="height: 100px" src="{{asset($allUser->profile->profileImage())}}" alt=""></a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @foreach($posts as $post)

        <div class="container">
            <div class="row pt-3 pb-1">
                <div class="col-6 offset-3">
                    <div class="d-flex align-items-center">
                        <img class="rounded-circle " style="width: 40px;height: 40px" src="{{asset($post->user->profile->profileImage())}}" alt="">
                        <a class="pl-2 pr-1 text-dark font-weight-bold" href="{{route('profile.index',[$post->user->id])}}">{{$post->user->username}}</a>
                    </div>
                    <hr>
                    <img class="img-fluid" src="{{asset('storage/'.$post->image)}}" alt="">
                </div>
                <div class="col-6 offset-3 pt-2">
                    <div class="d-flex">
                        <a class="pr-1 text-dark font-weight-bold" href="{{route('profile.index',[$post->user->id])}}">{{$post->user->username}}</a>
                        <p>{{$post->caption}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <div class="d-flex justify-content-center mt-3">{{$posts->links()}}</div>
@endsection
