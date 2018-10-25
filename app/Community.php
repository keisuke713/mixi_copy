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
}
