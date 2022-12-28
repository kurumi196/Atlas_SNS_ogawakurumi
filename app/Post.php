<?php

namespace App;

// use Illuminate\Notifications\Notifiable;  *****要らないかも？いつ書いたかわからない
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable=[
        'user_id',
        'post',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
