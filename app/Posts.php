<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $table = 'posts';

    protected $fillable = ['users_id', 'caption', 'foto', 'created_at', 'updated_at'];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function Comment()
    {
        return $this->hasMany('App\Comment');
    }
}
