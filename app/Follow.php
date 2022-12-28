<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{

    protected $table='follows';

    protected $fillable = [
        'following_id', 'followed_id'
    ];

    public function user(){
        return $this->belongsToMany('App\User');
    }
}
