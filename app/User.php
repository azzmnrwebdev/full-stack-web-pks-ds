<?php

namespace App;

use App\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = ['username', 'email', 'name', 'role_id', 'password', 'email_verified_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $primaryKey = 'id';

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->{$user->getKeyName()})) {
                $user->{$user->getKeyName()} = Str::uuid();
            }

            $user->role_id = Role::where('name', 'author')->first()->id;
        });
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function otp_code()
    {
        return $this->hasOne('App\OtpCode');
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function post()
    {
        return $this->hasMany('App\Post');
    }
}
