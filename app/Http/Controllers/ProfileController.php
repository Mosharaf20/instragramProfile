<?php

namespace App\Http\Controllers;
use App\Post;
use App\Profile;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use phpDocumentor\Reflection\Types\Object_;
use PhpParser\Node\Expr\New_;
use PhpParser\Node\Stmt\Catch_;
use function Symfony\Component\Console\Tests\Command\createClosure;

class ProfileController extends Controller
{

    public function index(User $user)
    {


        $postCount = Cache::remember(
            'count.posts' . $user->id,
            now()->addSecond(30),
            function () use ($user) {
                return $user->posts->count();
            });
            $followersCount = Cache::remember(
                'followers.count' . $user->id,
                now()->addSecond(30),
                function () use ($user) {
                    return $user->profile->followers->count();
                });

            $followingCount = Cache::remember(
                'following.count'
                .$user->id,now()->addSecond(30),
                function()use($user){
                    return $user->following->count();

            });

            $follows = auth()->user() ? auth()->user()->following->contains($user->id) : false;
            return view('profile.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));

    }

    public function edit(User $user){

        $this->authorize('update',$user->profile);
        return view('profile.edit',compact('user'));
    }

    public function update(User $user){
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'',
            'description'=>'',
            'url'=>'',
            'profile_img'=>'',
        ]);

        if(request('profile_img')){
            $imagePath = request('profile_img')->store('profile','public');
            $image =Image::make(public_path("storage/{$imagePath}"))->fit(1000,700);
            $image->save();

            $arrayImage = ['profile_img'=>$imagePath];
        }

        auth()->user()->profile()->update(array_merge(
            $data,
            $arrayImage ?? []
        ));
        return redirect("profile/{$user->id}");
    }


}
