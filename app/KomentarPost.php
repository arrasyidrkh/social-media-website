<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KomentarPost extends Model
{
    protected $guarded = [];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
