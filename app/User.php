<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password','bio','images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post(){
        return $this->hasMany('App\Post');
    }

    public function follows(){
        return $this->belongsToMany(User::class,'follows','following_id','followed_id');
    }

    public function followed(){
        return $this->belongsToMany(User::class,'follows','followed_id','following_id');
    }

    public function isfollowing($id){//現在進行形でフォロー中
        return (boolean) $this->follows()->where("followed_id",$id)->first(['follows.id']);
    }

    public function isfollowed(){//受身形フォローされている
        return (boolean) $this->follows()->where("following_id",$id)->first(['follows.id']);
    }
}
