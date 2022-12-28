<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Laravelで最初に表示するページの設定
Route::get('/', function () {return redirect('/login');});

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::group(['middleware' => 'auth'], function(){
    Route::get('/',function(){return redirect('/top');});

// ********** header **********
    Route::get('/top','PostsController@show');
    Route::get('/logout','Auth\LoginController@logout');
    Route::get('/myprofile','UsersController@myprofile');

// ********** /top **********
    Route::post('post/create','PostsController@postCreate');
    Route::post('post/update','PostsController@postUpdate');
    Route::get('post/{id}/delete','PostsController@postDelete');

// ********** /search **********
    Route::get('/search','UsersController@search');
    Route::post('/search','UsersController@search');
    Route::get('/search/{id}/unfollow','UsersController@unfollow');
    Route::get('/search/{id}/follow','UsersController@follow');

// ********** /follow-list **********
    Route::get('/follow-list','FollowsController@followList');

// ********** /follower-list **********
    Route::get('/follower-list','FollowsController@followerList');

// ********** /profile **********
    Route::get('/profile/{id}','UsersController@profile');
    // Route::post('/profile/{id}','UsersController@profile');
    Route::get('/profile/{id}/unfollow','UsersController@unfollowP');
    Route::get('/profile/{id}/follow','UsersController@followP');

// ********** /myprofile **********
    Route::get('/myprofile','UsersController@myprofile');
    Route::post('/edit/myprofile','UsersController@editMyprofile');
});
