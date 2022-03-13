<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';
    protected $fillable = ['comment_id', 'users_id', 'reply'];

    public function comment()
    {
        return $this->belongsTo('App\Comment', 'comment_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'users_id');
    }
}
