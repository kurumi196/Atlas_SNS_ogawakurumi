<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    public function show(){
        $following_id=Auth::user()->follows()->pluck('followed_id');
        $user=Auth::id();
        $posts = Post::with('user')->whereIn('user_id',$following_id)->orWhere('user_id',$user)->latest()->get();

        return view('posts.index',compact('posts'));
    }

    public function postCreate(Request $request){
        $posts=new Post;
        $form=$request->all();
        $id=Auth::id();

        Post::create([
            'user_id'=>$id,
            'post'=>$form['newPost'],
        ]);
        return redirect('/top');
    }

    public function postUpdate(Request $request){
        $form=$request->input('upPost');
        $id=$request->input('id');

        Post::where('id',$id)->update(['post'=>$form]);
        return redirect('/top');
    }

    public function postDelete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
