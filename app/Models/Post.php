<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Post extends Model
{
    public function user()
    {
        //1 post belong to 1 user
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        //1 post has many comments
        return $this->hasMany('App\Models\Comment');
    }

    public function readableDate($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
