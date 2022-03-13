<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $table = 'profile';

    protected $fillable = ['users_id', 'fullname', 'age', 'gender', 'phone', 'country', 'address', 'bio', 'foto'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
