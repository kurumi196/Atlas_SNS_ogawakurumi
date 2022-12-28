<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use App\follow;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
// ********** /my profile **********
    public function myprofile(){
        $id=Auth::id();
        $user=Auth::user();
        return view('users.myprofile',compact('user'));
}

    protected function validator(array $data){
        return validator::make($data,[
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40',
            'password' => 'required|string|regex:/^[a-zA-Z0-9]+$/|min:8|max:20|confirmed',
            'password_confirmation'=>'required|string|regex:/^[a-zA-Z0-9]+$/|min:8|max:20',
            'bio'=>'nullable|string|max:150',
            'images'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|regex:/\A([a-zA-Z0-9])+\z/u'
        ]);
    }

    public function editMyprofile(Request $request){
        $data=$request->input();
        $validator=$this->validator($data);
        if($validator->fails()){
            return redirect('myprofile')
            ->withErrors($validator)->withInput();
        } else{
            $user=Auth::user();
            $user->fill($request->all());
            $user->password=bcrypt($request->get('password'));
            $image=$request->file('images');
            $image_path=$image->storeAs('',$image->getClientOriginalName(), 'public');
            $user->images=$image_path;

            $user->save();
        }

        return redirect('/myprofile');
    }



// ********** /search **********
    public function search(Request $request){
        $keyword = $request->input('user_search');

        if (!empty($keyword)){
            $users = User::where('username','like','%'.$keyword.'%')
            ->where('id','<>',Auth::id())->get();
            $request->session()->put('search', $keyword);
        }
        else {
            $users=User::where('id','<>',Auth::id())->get();
        }
        return view('users.search',compact('users'))->with('keyword',$keyword);
    }

    public function unfollow($id){
        follow::where('followed_id', $id)->delete();
        return redirect('/search');
    }

    public function follow($id){
        follow::create(['following_id'=>Auth::id(),'followed_id'=>$id]);
        return redirect('/search');
    }

// ********** /profile **********
    public function profile($id){
        $posts=Post::where('posts.user_id',$id)->latest()->get();
        $user=User::where('id',$id)->first();
        // dd($user);

        return view('users.profile',compact('posts','user'));
    }

    public function unfollowP($id){
        follow::where('followed_id', $id)->delete();
        return redirect('/profile/'.$id);
    }

    public function followP($id){
        follow::create(['following_id'=>Auth::id(),'followed_id'=>$id]);
        return redirect('/profile/'.$id);
    }


}
