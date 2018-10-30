<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'title' => 'required',
        'date' => 'required',
        'place' => 'required',
        'detail' => 'required',
    );

    public function community()
    {
        return $this->belongsTo('App\Community');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
