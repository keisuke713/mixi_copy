<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'age', 'hobby', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tweets()
    {
        return $this->hasMany('App\Tweet');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function events()
    {
        return $this->hasMany('App\Event');
    }

    public function communities()
    {
        return $this->belongsToMany('App\Community');
    }
}
