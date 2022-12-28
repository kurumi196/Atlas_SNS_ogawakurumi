<?php

namespace App;

// use Illuminate\Notifications\Notifiable;  *****要らないかも？いつ書いたかわからない
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // use Notifiable;  *****要らないかも？いつ書いたかわからない

    protected $fillable=[//*****modelの初期設定でfillableしないと値を入れられない
        'user_id',
        'post',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

}
