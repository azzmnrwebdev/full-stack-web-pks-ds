<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    public $incrementing = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            if (empty($role->{$role->getKeyName()})) {
                $role->{$role->getKeyName()} = Str::uuid();
            }
        });
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
