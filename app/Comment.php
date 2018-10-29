<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public static $rules = array(
        'content' => 'required',
    );

    public function community()
    {
        return $this->belongsTo('App\community');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweet()
    {
        return $this->belongsTo('App\Tweet');
    }
}
