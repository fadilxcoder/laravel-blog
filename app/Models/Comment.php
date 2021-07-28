<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Comment extends Model
{

    public function user()
    {
        //1 comment belong to 1 user
        return $this->belongsTo('App\Models\User');
    }

    public function post()
    {
        //1 comment belong to 1 post
        return $this->belongsTo('App\Models\Post');
    }

    public function readableDate($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
