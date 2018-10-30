<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    //
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'detail' => 'required',
        'image' => 'required',
    );

    //tweetとの関連付け
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

    public function users()
    {
        return $this->belongsToMany('App\Models\User::class');
    }
}
