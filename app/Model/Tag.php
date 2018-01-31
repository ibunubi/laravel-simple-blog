<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('App\Model\Post', 'post_tag', 'post_id', 'tag_id');
    }
}
