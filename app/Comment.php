<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = ['posts_id', 'users_id', 'comment'];

    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }

    public function reply()
    {
        return $this->hasMany('App\Reply');
    }
}
