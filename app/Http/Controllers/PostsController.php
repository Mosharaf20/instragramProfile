<?php

namespace App\Http\Controllers;

use App\Post;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $allUsers = User::all();
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $posts = Post::whereIn('user_id',$users)->with('user')->inRandomOrder()->latest()->paginate(5);
        return view('posts.index',compact('posts','allUsers'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
       $userId = auth()->user()->id;
       $data = request()->validate([
            'caption'=>'required|max:22',
            'image'=>['required','image'],
        ]);

       $imagePath = request('image')->store('uploads','public');
       $image = Image::make(public_path("storage/{$imagePath}"))->fit(720,500);
       $image->save();
        auth()->user()->posts()->create([
            'caption'=>$data['caption'],
            'image'=>$imagePath,
        ]);
        return redirect("profile/{$userId}");
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    }

}
