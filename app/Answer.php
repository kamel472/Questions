<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rating;

class Answer extends Model
{
    protected $fillable = [
        'body', 'question_id', 'user_id','approved'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->hasMany('App\Like');
    }

    public function ratings()
    {
        return $this->hasMany('App\Rating');
    }
    
}
