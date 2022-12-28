<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Follow;
use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
// ********** /follow-list **********
    public function followList(){
        $followed_id=Auth::user()->follows()->pluck('followed_id');
        $posts=Post::with('user')->whereIn('posts.user_id',$followed_id)->latest()->get();
        $users=Auth::user()->follows()->get();

        return view('follows.followList',compact('posts','users'));
    }

// ********** /follower-list **********
    public function followerList(){
        $following_id=Auth::user()->followed()->pluck('following_id');
        $posts=Post::with('user')->whereIn('posts.user_id',$following_id)->latest()->get();
        $users=Auth::user()->followed()->get();

        return view('follows.followerList',compact('posts','users'));
    }

}
