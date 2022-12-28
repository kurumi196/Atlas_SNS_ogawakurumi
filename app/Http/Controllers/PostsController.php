<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{

    //kari全表示
    // public function index(){
    //     $user=Auth::user();
    //     $posts=Post::with('user')->get();

    //     return view('posts.index',['user'=>$user, 'posts'=>$posts]);
    // }


    public function show(){
        $following_id=Auth::user()->follows()->pluck('followed_id');
        $user=Auth::id();
        // dd($user);
        $posts = Post::with('user')->whereIn('user_id',$following_id)->orWhere('user_id',$user)->latest()->get();
        // dd($posts);

        return view('posts.index',compact('posts'));
    }

    //***** create ***** FIX

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

    //***** update *****

    public function postUpdate(Request $request){
        $form=$request->input('upPost');
        $id=$request->input('id');

        Post::where('id',$id)->update(['post'=>$form]);
        return redirect('/top');
    }

    //***** delete *****

    public function postDelete($id){
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
