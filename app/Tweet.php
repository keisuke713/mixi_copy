<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        //'community_id' => 'required',
        //'user_id' => 'required',
        'content' => 'required',
    );

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function community()
    {
        return $this->belongsTo('App\Community');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}
