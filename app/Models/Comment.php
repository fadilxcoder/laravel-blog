<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Carbon\Carbon as Carbon;

class Comment extends Model
{
    use HasFactory;

    public function user()
    {
        # 1 comment belong to 1 user
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        # 1 comment belong to 1 post
        return $this->belongsTo(Post::class);
    }

    public function readableDate($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
