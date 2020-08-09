<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

   protected $guarded =[];

    public function profileImage(){
        $imagePath = ($this->profile_img) ? $this->profile_img:'profile/avatar.png';
        return '/storage/'.$imagePath;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }
}
