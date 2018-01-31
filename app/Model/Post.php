<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body'];

    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag');
    }
}
