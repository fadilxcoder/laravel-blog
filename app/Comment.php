<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Comment extends Model
{
    
    public function user()
    {
        //1 comment belong to 1 user
        return $this->belongsTo('App\User');
    }
    
    public function post()
    {
        //1 comment belong to 1 post
        return $this->belongsTo('App\Post');
    }
    
    public function readableDate($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
